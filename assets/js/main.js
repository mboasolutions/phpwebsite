
    $('[data-confirm]').on('click', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var message = $(this).data('confirm');

        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    window.location.href = href
                )
            }
        })

    });




    $("span.timeago").timeago();




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




    $('a.like').on('click', function(e){
        e.preventDefault();

        var id = $(this).attr('id');
        var url = 'ajax/micropost_like.php';
        var action = $(this).data('action');
        var micropost_id = id.split('like')[1];

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                micropost_id: micropost_id,
                action: action
            },
            success: function f(likers) {
                $('#likers_' + micropost_id).html(likers)
                if (action == 'like'){
                    $('#' + id).html("Je n'aime plus").data('action', 'unlike');
                }else {
                    $('#' + id).html("J'aime").data('action', 'like');
                };
            }

        });

    });



    /*$('#searchbox').on('keyup', function(){

        var query = $(this).val();
        var url = 'ajax/search.php';

        if (query.length > 0){
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    query: query
                },

                success: function f(data) {
                    $('#display-results').html(data).show();
                    $('#spinner').show();
                },


            });

        }else{
            $('#display-results').hide();
            $('#spinner').hide();
        }


    });*/


    // Define our button click listener
    $('#searchbox').on('keyup', function () {

        var query = $(this).val();
        var url = 'ajax/search.php';
        // On click, execute the ajax call.
        if (query.length > 0) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    query: query
                },
                /*beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                    $('#spinner').hide();
                    $('#loader').removeClass('hidden');
                },*/
                success: function (data) {
                    $('#display-results').html(data).show();
                    $('#spinner').show();
                },
                /*complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
                    $('#spinner').hide();
                    $('#loader').addClass('hidden')
                },*/
            });

        }else{
            $('#display-results').hide();
            $('#spinner').hide();
        }

    });


   
