<?php
// header('Content-Type: application/json');

/**
 * Renvoi une instance de la classe PDO.
 *
 * @return PDO
 */
function db_connexion(bool $debug=false)
{
    // Inclusion de la connexion à la base de donnée.
    include '../../dashboard/pdo_connexion.php';

    // Activation du debugage de PDO.
    if ($debug === true) {
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Renvoi de la resource de connexion.
    return $bdd;
}

/**
 * Récupèrent les informations des magasins enregistré dans la base de donnée.
 *
 * @return array
 */
function get_maps() {

    // Connexion à la base de donnée.
    $db = db_connexion(true);

    // Sélection de tous les magasins de la base de donnée.
    $sql = "SELECT id_magasin AS ID, name, popup_content AS popupContent, coordinates FROM magasin";
    $statment = $db->query($sql);
    $magasin = $statment->fetchAll(PDO::FETCH_ASSOC);

    return $magasin;
}

/**
 * Formate une liste de magasin pour qu'ils soit compatibles avec l'API Mapbox.
 * @param array $magasins .
 *
 * @return array
 */
function format_to_maps(array $magasins)
{
    foreach ($magasins as $magasin) {
        // Convertion des coordonées au format attendue par l'API.
        if (!empty($magasin['coordinates'])) {
            $coordonee = explode(',', substr($magasin['coordinates'], 1, strlen($magasin['coordinates'])-2));
            $coordonee[0] = ((double)$coordonee[0]);
            $coordonee[1] = ((double)$coordonee[1]);
        }

        // Tableau au format de l'API.
        $mapbox_magasin[] = [
            'type' => 'Feature',
            'properties' => [
                'ID' => (int)$magasin['ID'],
                'name' => $magasin['name'],
                'popupContent' => $magasin['popupContent']
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => $coordonee
            ]
        ];
    }

    return $mapbox_magasin;
}

/* Récupérations de la liste des magasin et formatage de ces derniers au format
de l'API Mapbox */
$magasin = format_to_maps(get_maps());

/* Fomatage de la liste de magasin au format JSON pour qu'il puissent être
par une requête AJAX et affichage du resultat. */
$magasin = json_encode($magasin);
exit($magasin);
