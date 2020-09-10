<!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

    <!-- Footer Elements -->
    <div class="container">

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1">
                    <i class="fa fa-facebook-f"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                    <i class="fa fa-twitter"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1">
                    <i class="fa fa-google-plus-g"></i>
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </li>
            <!--<li class="list-inline-item">
                <a class="btn-floating btn-dribbble mx-1">
                    <i class="fa fa-dribbble"> </i>
                </a>
            </li>-->
        </ul>
        <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->
    <hr class="bg-primary">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright -
        <a href="https://mdbootstrap.com/"> MboaSoft</a>
    </div>
    <!-- Copyright -->

</footer>

<!--<script src="assets/js/bootstrap.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="libraries/parsley/parsley.min.js"></script>

<!--<script src="libraries/parsley/i18n/fr.js"></script>
<script type="text/javascript">
    window.ParsleyValidator.setLocale('fr');
</script>-->

<script type="text/javascript">
    $( document ).ready(function() {
        Parsley.addMessages('fr', {
            defaultMessage: "Cette valeur semble non valide.",
            type: {
                email:        "Cette valeur n'est pas une adresse email valide.",
                url:          "Cette valeur n'est pas une URL valide.",
                number:       "Cette valeur doit être un nombre.",
                integer:      "Cette valeur doit être un entier.",
                digits:       "Cette valeur doit être numérique.",
                alphanum:     "Cette valeur doit être alphanumérique."
            },
            notblank:       "Cette valeur ne peut pas être vide.",
            required:       "Ce champ est requis.",
            pattern:        "Cette valeur semble non valide.",
            min:            "Cette valeur ne doit pas être inférieure à %s.",
            max:            "Cette valeur ne doit pas excéder %s.",
            range:          "Cette valeur doit être comprise entre %s et %s.",
            minlength:      "Cette chaîne est trop courte. Elle doit avoir au minimum %s caractères.",
            maxlength:      "Cette chaîne est trop longue. Elle doit avoir au maximum %s caractères.",
            length:         "Cette valeur doit contenir entre %s et %s caractères.",
            mincheck:       "Vous devez sélectionner au moins %s choix.",
            maxcheck:       "Vous devez sélectionner %s choix maximum.",
            check:          "Vous devez sélectionner entre %s et %s choix.",
            equalto:        "Cette valeur devrait être identique."
        });

        Parsley.setLocale('fr');
    });
</script>

</body>
</html>
