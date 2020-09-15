<?php $title = 'Page de Profile'; ?>
<?php include('partials/_header.php'); ?>
<!-- /.container -->
<main role="main" class="container" xmlns="http://www.w3.org/1999/html">
    <?php include('partials/_errors.php'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-secondary mb-6" style="max-width: 32rem;"">
                    <div class="card-header">
                    <h5><b>Profile de  <?= e($user->pseudo )?></b> (<?= friends_count($_GET['id']) ?> ami<?= friends_count($_GET['id']) == 1 ? '' : 's' ?>)</h5>
                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <?php if (!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')): ?>
                                <?php include('partials/_relation_links.php'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?= !empty(e($user->avatar)) ? e($user->avatar) : get_avatar_url($user->email) ?>" alt="Image de profile de <?= e($user->pseudo) ?>" class="rounded-circle" width="100" height="100">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <strong><?= e($user->pseudo) ?></strong><br>
                                <i class="fa fa-envelope"></i>&nbsp;<a href="mail to : <?= e($user->email) ?>"><?= e($user->email) ?></a><br>
                                <?=
                                    $user->city && $user->country
                                    ? '<i class="fa fa-location-arrow"></i>&nbsp;'.e($user->city).' - '.e($user->country).'<br>'
                                    : '';
                                ?><i class="fa fa-map-marker"></i>&nbsp;<a href="https://www.google.cm/maps?q=<?= e($user->city).' '.e($user->country)?>" target="_blank">Voir sur google maps!</a>
                            </div>

                            <div class="col-sm-6">
                                <?=
                                $user->twitter
                                    ? '<i class="fa fa-twitter"></i>&nbsp;<a href="//twitter.com'.e($user->twitter).'">@'.e($user->twitter).'</a><br>'
                                    : '';
                                ?>
                                <?=
                                $user->github
                                    ? '<i class="fa fa-github"></i>&nbsp;<a href="//github.com'.e($user->github).'">'.e($user->github).'</a><br>'
                                    : '';
                                ?>
                                <?=
                                $user->sex == "M"
                                    ? '<i class="fa fa-male"></i>'
                                    : '<i class="fa fa-female"></i>';
                                ?>
                                <?=
                                $user->available_for_hiring
                                    ? 'Disponible pour emploi'
                                    : 'Non disponible pour emploi';
                                ?>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 well">
                                <h5>Petite biographie de <?= e($user->name)?> </h5>
                                <p>
                                    <?=
                                    $user->bio ? nl2br(e($user->bio)) : 'Aucune biographie pour le moment...';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>
            <div class="status-post">
                <form data-parsley-validate action="microposts.php" method="post" autocomplete="off">
                    <?php include('partials/_errors.php'); ?>
                    <div class="form-group">
                        <label for="content" class="sr-only">Statut :</label>
                        <textarea class="form-control" name="content" id="content" rows="3" placeholder="Alors quoi de neuf ?" required="required"
                                  data-parsley-minlength="3"  data-parsley-maxlength="140"></textarea>
                    </div>

                    <div class="form-group status-post-submit">
                         <input type="submit" name="publish" value="Publier" class="btn btn-outline-primary btn-xs">
                    </div>
                </form>
            </div><br><br><br>
            <?php endif; ?>

            <?php if(count($microposts) != 0) : ?>
                <?php foreach ($microposts as $micropost) : ?>
                    <?php include('partials/_micropost.php'); ?>
                <?php endforeach ?>
            <?php else: ?>
                <p>Cet utilisateur n'a encore rien poste pour le moment ...</p>
            <?php endif ?>


        </div>
    </div>

</main>



<?php include('partials/_footer.php'); ?>



