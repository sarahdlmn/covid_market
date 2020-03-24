// function setProductStorage(nom, quantite, id_categorie)
// {
//     let produits = JSON.parse(localStorage.getItem('produits'));
//
//     produits.map((produit) => {
//         if (produit.nom === nom) {
//             produit.quantite = quantite;
//         } else {
//             produits.push({
//                 'nom': nom,
//                 'qauntite': quantite,
//                 'categorie': id_categorie
//             });
//         }
//     });
//     localStorage.setItem('produits', JSON.stringify(produits));
// }
//
// function getProductStorage()
// {
//     let produits = JSON.parse(localStorage.getItem('produits'));
//     return (produits !== null) ? produits : cleanProductStorage();
// }
//
// function cleanProductStorage()
// {
//     return localStorage.setItem('produits', JSON.stringify([]));
// }

function getProductName(element)
{
    let td = $(element).parent().parent().parent().find('td');
    let nom = $(td[0]).text();
    return nom;
};

function getProductQuantity(element)
{
    let td = $(element).parent().parent().parent().find('td');
    let quantite = parseInt($(element).val());
    return quantite;
}

function getProductCategorie(element)
{
    let td = $(element).parent().parent().parent().find('td');
    let categorie = $('#category').val();
    return categorie;
}

function productRender(produits)
{
    // Retire les lignes du tableau de produit.
    $('#produit_ajax').empty();

    produits.map ((produit) => {
        let nom, quantite;
        let tr;
        nom = produit.nom_produit;
        quantite = (produit.quantite === null) ? 0 : parseInt(produit.quantite);
        $('#produit_ajax').append('<tr></tr>');
        tr = $('#produit_ajax').find('tr:last-child');
        tr.data('id', produit.id_produit);
        $(tr).append('<td>' + nom + '</td>');
        $(tr).append('<td><div class="form-group"><input class="form-control input-quantite" type="number" min="0" aria-describedby=helpId value="' + quantite + '"></div></td>');
    });
}

$(function () {
    // Lancement d'un évenement lors de la selection d'une categorie.
    $('#category').on('change', function () {
        // Récupération Ajax des produits liée à la catégorie.
        $.get('http://localhost/covid_market/assets/REST/bdd_requete.php', "id=" + this.value, function (data) {
            let produits = JSON.parse(data);
            // Affichage de la liste de produits.
            productRender(produits);

            // Lance un évenement lors de la modification de l'input contenant la quantité des produits.
            $('.input-quantite').on('change', function() {
                // Récupérations des valeurs des champs.
                let nom = getProductName(this);
                let quantite = getProductQuantity(this);
                let categorie = getProductCategorie(this);

                // Envoi vers le serveur les informations modifiée.
                $.post('http://localhost/covid_market/assets/REST/bdd_requete.php', {
                    'nom': nom,
                    'quantite': quantite,
                    'categorie': categorie
                }, function(data){
                });
            });
        });
    });
});
