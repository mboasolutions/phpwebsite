<?php $title = 'Changer mot de passe'; ?>
<?php include('partials/_header.php'); ?>

<!-- /.container -->
<main role="main" class="container" xmlns="http://www.w3.org/1999/html">

    <div class="row justify-content-center">
        <div class="col-md-6 col-md-3">
            <div class="card text-white bg-secondary mb-6">

                <div class="card-header">
                    <h5><b>Changer mot de passe</b></h5>
                </div>
                <div class="card-body">
                    <form data-parsley-validate method="post">
                        <?php include('partials/_errors.php'); ?>
                                <!-- Current password field -->
                                <div class="form-group">
                                    <label class="control-label" for="current_password">Mot de passe actuel <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="current_password" name="current_password"
                                           required="required">

                                </div>

                                <!-- New password field -->
                                <div class="form-group">
                                    <label class="control-label" for="new_password">Nouveau mot de passe <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                           required="required" data-parsley-minlength="6">

                                </div>

                                <!-- Confirm New password field -->
                                <div class="form-group">
                                    <label class="control-label" for="new_password_confirm">Confirmez le nouveau mot de passe <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="new_password_confirm" name="new_password_confirm"
                                           data-parsley-equalto="#new_password" required="required">

                                </div>

                        <button type="submit" class="btn btn-primary" value="Valider" name="change_password">Valider</button>
                    </form>
                </div>
            </div>

        </div>
</main>


<?php include('partials/_footer.php'); ?>



