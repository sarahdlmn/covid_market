function get_inputs_value() {
    let magasin = {
        'name': $('#nom').val(),
        'popup': $('#popup').val(),
        'horaire': $('#horaire').text(),
        'commentaires': $('#commentaires').text(),
        'adresse': $('#adresse').text()
    }

    return magasin;
}

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
        show_magasin_details(data);
    });
}

function show_magasin_details(magasin)
{
    console.log(magasin);
    $('#nom').val(magasin.name);
    $('#popup').val(magasin.popup_content);
    $('#horaire').text(magasin.horaire);
    $('#commentaires').text(magasin.commentaires);
    $('#adresse').text(magasin.adresse);
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
