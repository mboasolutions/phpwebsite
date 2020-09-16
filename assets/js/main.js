$(document).ready(function () {
    $('[data-confirm]')
        .on('click', function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var message = $(this).data('confirm');
            Swal.fire({
                title: "Êtes-vous sûr?",
                text: message, //Utiliser la valeur de data-confirm comme text
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Annuler",
                confirmButtonText: "Oui",
                confirmButtonColor: "#DD6B55"
                }, function (isConfirm) {
                if (isConfirm) {
                    //Si l'utilisateur clique sur Oui,
                    // Il faudra le rediriger l'utilisateur vers la page
                    // de suppression
                    window.location.href = href;
                }

            });
        });
    });


    $(document).ready(function () {
        $("span.timeago").timeago();
    });


    $(document).ready(function () {
        Parsley.addMessages('fr', {
            defaultMessage: "Cette valeur semble non valide.",
            type: {
                email: "Cette valeur n'est pas une adresse email valide.",
                url: "Cette valeur n'est pas une URL valide.",
                number: "Cette valeur doit être un nombre.",
                integer: "Cette valeur doit être un entier.",
                digits: "Cette valeur doit être numérique.",
                alphanum: "Cette valeur doit être alphanumérique."
            },
            notblank: "Cette valeur ne peut pas être vide.",
            required: "Ce champ est requis.",
            pattern: "Cette valeur semble non valide.",
            min: "Cette valeur ne doit pas être inférieure à %s.",
            max: "Cette valeur ne doit pas excéder %s.",
            range: "Cette valeur doit être comprise entre %s et %s.",
            minlength: "Cette chaîne est trop courte. Elle doit avoir au minimum %s caractères.",
            maxlength: "Cette chaîne est trop longue. Elle doit avoir au maximum %s caractères.",
            length: "Cette valeur doit contenir entre %s et %s caractères.",
            mincheck: "Vous devez sélectionner au moins %s choix.",
            maxcheck: "Vous devez sélectionner %s choix maximum.",
            check: "Vous devez sélectionner entre %s et %s choix.",
            equalto: "Cette valeur devrait être identique."
        });

        Parsley.setLocale('fr');
    });



/*$('#myTab a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
});*/

/*$(document).ready(function() {
        $("span.timeago").timeago().livequery(function () {
            $(this).timeago();
        });

});*/