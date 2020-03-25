
function productRender(produits) //les quantités ne doivent pas pouvoir être changées
{
    // Retire les lignes du tableau de produit.
    $('#produits_list').empty();

    produits.map ((produit) => {
        let nom, quantite;
        let tr;
        nom = produit.nom_produit;
        quantite = (produit.quantite === null) ? 0 : parseInt(produit.quantite);
        $('#produits_list').append('<tr></tr>');
        tr = $('#produits_list').find('tr:last-child');
        $(tr).append('<td>' + nom + '</td>');
        $(tr).append('<td><div class="form-group"><input class="form-control" type="number" min="0" aria-describedby=helpId value="' + quantite + '"></div></td>');
    });
}

function get_magasin_by_id()
{
    let id_magasin = $('#id_magasin').val();
    // Récupération Ajax des produits liée à la catégorie.
    $.get('./assets/Rest/magasin.php?id_magasin=' + id_magasin + '', function(data){
        $('#category').on('change', function () {
            $.get("./assets/REST/stock.php?id_categorie=" + this.value + "&id_magasin=" + id_magasin, function (data) {
                console.log("Je suis ic");
                let produits = JSON.parse(data);
                // Affichage de la liste de produits.
                console.log(produits);
                productRender(produits);
            });
        });
    });
}

$(function () {
    get_magasin_by_id();
    // // Lancement d'un évenement lors de la selection d'une categorie.
    // let adresseDeBddRequete = "../REST/magasin.php?id_magasin=" + this.value;
    // $('#category').on('change', function () {
    //     // Récupération Ajax des produits liée à la catégorie.
    //     $.get(adresseDeBddRequete, "id_categorie=" + this.value, function (data) {
    //         let produits = JSON.parse(data);
    //         // Affichage de la liste de produits.
    //         console.log(produits);
    //         productRender(produits);
    //     });
    // });
});
