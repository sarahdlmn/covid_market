/**
 * Récupèrent les informations validé
 *
 * @return void
 */
function get_inputs_value() {
    let magasin = {
        'name': $('#nom').val(),
        'popup': $('#popup').val(),
        'horaire': $('#horaire').val(),
        'commentaires': $('#commentaires').val(),
        'adresse': $('#adresse').val()
    }

    return magasin;
}

/**
 * Modifie les informations du magasin de la session courante.
 *
 * @return void
 */
function set_magasin()
{
    let magasin = get_inputs_value();
    console.log(magasin);
    $.post('../assets/REST/magasin.php', {
        'name': magasin['name'],
        'popup': magasin['popup'],
        'horaire': magasin['horaire'],
        'commentaires': magasin['commentaires'],
        'adresse': magasin['adresse'],
    }, function(data){
        console.log(data);
        data = JSON.parse(data);
        show_magasin_details(data);
    });
}

function show_magasin_details(magasin)
{
    console.log(magasin);
    $('#nom').val(magasin.name);
    $('#popup').val(magasin.popup_content);
    $('#horaire').val(magasin.horaire);
    $('#commentaires').val(magasin.commentaires);
    $('#adresse').val(magasin.adresse);
}

$(function () {
    $('#nom').on('change', function() {
        set_magasin();
    });

    $('#popup').on('change', function() {
        set_magasin();
    });

    $('#horaire').on('change', function() {
        set_magasin();
    });

    $('#commentaires').on('change', function() {
        set_magasin();
    });

    $('#adresse').on('change', function() {
        set_magasin();
    });

});
