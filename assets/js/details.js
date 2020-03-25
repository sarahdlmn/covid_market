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

function productRender(produits) //les quantités ne doivent pas pouvoir être changées 
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
        $(tr).append('<td><div class="form-group"><input class="form-control" type="number" min="0" aria-describedby=helpId value="' + quantite + '"></div></td>');
    });
}

$(function () {
    // Lancement d'un évenement lors de la selection d'une categorie.
    let adresseDeBddRequete ="./assets/REST/bdd_requete.php";
    $('#category').on('change', function () {
        if (this.value != null) {
            // Récupération Ajax des produits liée à la catégorie.
            $.get(adresseDeBddRequete, "id_categorie=" + this.value, function (data) {
                let produits = JSON.parse(data);
                // Affichage de la liste de produits.
                console.log(produits);
                productRender(produits);
        });
    });
});
