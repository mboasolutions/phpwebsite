<?php $title = 'Edition de Profile'; ?>
<?php include('partials/_header.php'); ?>

    <!-- /.container -->
<main role="main" class="container" xmlns="http://www.w3.org/1999/html">
    <?php include('partials/_errors.php'); ?>

    <div class="row">

        <?php if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>
            <div class="col-md-6" style="left:225px;">
                <div class="card text-white bg-secondary mb-6" style="max-width: 32rem;">

                <div class="card-header">
                    <h5><b>Completer mon profile</b></h5>
                </div>
                <div class="card-body">
                    <form data-parsley-validate method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Name field -->
                                <div class="form-group">
                                    <label class="control-label" for="name">Nom <span
                                                class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="<?= get_input_data('name') ?: e($user->name) ?>"
                                           placeholder="Votre nom" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- City field -->
                                <div class="form-group">
                                    <label class="control-label" for="city">Ville <span
                                                class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city"
                                           value="<?= get_input_data('city') ?: e($user->city) ?>"
                                           placeholder="Votre ville" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Country field -->
                                <div class="form-group">
                                    <label class="control-label" for="country">Pays <span
                                                class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="country" name="country"
                                           value="<?= get_input_data('country') ?: e($user->country) ?>"
                                           placeholder="Votre pays" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Sex field -->
                                <div class="form-group">
                                    <label class="control-label" for="sex">Sexe <span
                                                class="text-danger">*</span></label>
                                    <select name="sex" id="sex" class="form-control" required="required">
                                        <option value="M" <?= e($user->sex) == "M" ? "selected" : "" ?>> Masculin
                                        </option>
                                        <option value="F" <?= e($user->sex) == "F" ? "selected" : "" ?>>Feminin</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Twitter field -->
                                <div class="form-group">
                                    <label class="control-label" for="twitter">Twitter</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter"
                                           value="<?= get_input_data('twitter') ?: e($user->twitter) ?>"
                                           placeholder="Votre compte twitter"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Github field -->
                                <div class="form-group">
                                    <label class="control-label" for="github">Github</label>
                                    <input type="text" class="form-control" id="github" name="github"
                                           value="<?= get_input_data('github') ?: e($user->github) ?>"
                                           placeholder="Votre compte github"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Available field -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <label for="available_for_hiring">
                                            <!--<input type="hidden" name="available_for_hiring" value="0" />-->
                                            <input type="checkbox"
                                                   name="available_for_hiring" <?= e($user->available_for_hiring) ? "checked" : "" ?>
                                            ">
                                            Disponible pour emploi?
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Bio field -->
                                <div class="form-group">
                                    <label for="bio">Biograhpie <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="bio" name="bio" rows="5" cols="30"
                                              aria-placeholder="Votre biographie"
                                              required="required"><?= get_input_data('bio') ?: e($user->bio) ?></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="Valider" name="update">Submit</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include('partials/_footer.php'); ?>