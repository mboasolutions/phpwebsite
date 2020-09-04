<?php $title = 'Connexion'; ?>
<?php include('partials/_header.php'); ?>
<!-- /.container -->
<main role="main" class="container">
    <h1 class="lead">Connexion !</h1>
    <?php include('partials/_errors.php'); ?>

    <form data-parsley-validate method="post" class="well col-md-6">
        <!-- Identifiant field -->
        <div class="form-group">
            <label class="control-label" for="identifiant">Pseudo ou adresse electronique:</label>
            <input type="text" class="form-control" id="identifiant" name="identifiant"
                   value="<?= get_input_data('identifiant') ?>" placeholder="Votre identifiant" required="required">
        </div>

        <!-- Password field -->
        <div class="form-group">
            <label class="control-label" for="password">Mot de Passe:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe"
                   required="required">
        </div>

        <button type="submit" class="btn btn-primary" value="Connexion" name="login">Submit</button>
    </form>


</main>

<?php include('partials/_footer.php'); ?>


