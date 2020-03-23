$(function () {
    $('#category').on('change', function () {
        $.get('../REST/bdd_requete.php', "id=" + this.value, function (data) {
            var myArray = JSON.parse(data);
            for (i = 0; i < myArray.length; i++) {

                //$('#produit_ajax').html('<tr><td scope="row">produit' +/*+ myArray[i].produit +*/'</td><td>43254' + /*+ myArray[i].quantite +*/ '</td></tr>');
            }
        });
    });
});
                $('div').html('<tr><td scope="row">' + myArray[i].nom_produit + '</td><td>' + myArray[i].quantite + '</td></tr>');