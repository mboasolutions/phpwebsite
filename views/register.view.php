<?php $title = 'Inscription'; ?>
<?php include('partials/_header.php'); ?>
<!-- /.container -->
<main role="main" class="container">
    <h1 class="lead">Devenez des a present membre!</h1>

    <form data-parsley-validate method="post" class="well col-md-6">
        <?php include('partials/_errors.php'); ?>
        <!-- Name field -->
        <div class="form-group">
            <label class="control-label" for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="<?= get_input_data('name') ?>" placeholder="Votre nom" required="required">
        </div>

        <!-- Pseudo field -->
        <div class="form-group">
            <label class="control-label" for="pseudo">Pseudo:</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo"
                   value="<?= get_input_data('pseudo') ?>" required="required" data-parsley-minlength="3">
        </div>

        <!-- Email field -->
        <div class="form-group">
            <label class="control-label" for="email">Adresse Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email"
                   value="<?= get_input_data('email') ?>" required="required" data-parsley-trigger="keypress">
        </div>

        <!-- Password field -->
        <div class="form-group">
            <label class="control-label" for="password">Mot de Passe:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe"
                   required="required" data-parsley-minlength="6">
        </div>

        <!-- Password Confirmation field -->
        <div class="form-group">
            <label class="control-label" for="password_confirm">Confirmez Votre Mot de Passe:</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                   placeholder="Confirmez votre mot de passe" required="required" data-parsley-equalto="#password">
        </div>

        <button type="submit" class="btn btn-primary" value="Inscription" name="register">Submit</button>
    </form>


</main>

<?php include('partials/_footer.php'); ?>
