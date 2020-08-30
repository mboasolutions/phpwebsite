<?php $title = 'Inscription';?>
<?php include('includes/constants.php');?>
<?php include('partials/_header.php');?>
<!-- /.container -->
<main role="main" class="container">
        <h1>Devenez des a present membre!</h1>
    <form method="post" class="well col-md-6">
        <!-- Name field -->
        <div class="form-group">
            <label class="control-label" for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" required="required">
        </div>

        <!-- Pseudo field -->
        <div class="form-group">
            <label class="control-label" for="pseudo">Pseudo:</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo" required="required">
        </div>

        <!-- Email field -->
        <div class="form-group">
            <label class="control-label" for="email">Adresse Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required="required">
        </div>

        <!-- Password field -->
        <div class="form-group">
            <label class="control-label" for="password">Mot de Passe:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required="required">
        </div>

        <!-- Password Confirmation field -->
        <div class="form-group">
            <label class="control-label" for="password_confirm">Confirmez Votre Mot de Passe:</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirmez votre mot de passe" required="required">
        </div>

        <button type="submit" class="btn btn-primary" value="Inscription" name="register">Submit</button>
    </form>


</main>

<?php include('partials/_footer.php');?>
