$(function () {
    $('#name').on('change', function () {
        $.get('../REST/bdd_requete.php', "id=" + this.value)
    });


    $('#popup').on('change', function () {
        $.get('../REST/bdd_requete.php', "id=" + this.value)

    });


    $('#horaires').on('change', function () {
        $.get('../REST/bdd_requete.php', "id=" + this.value)
    });

    $('#comments').on('change', function () {
        $.get('../REST/bdd_requete.php', "id=" + this.value)
    });


    $('#adress').on('change', function () {
        $.get('../REST/bdd_requete.php', "id=" + this.value)
    });

});
