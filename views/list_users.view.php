<?php $title = 'Liste des utilisateurs'; ?>
<?php include('partials/_header.php'); ?>
<!-- /.container -->
<style>
    .users {
        margin-bottom: 3em;
    }

    .user-block {
        text-align: center;
    }

    .avatar {
        margin: auto;
    }
</style>
<div class="main-container">
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <?php foreach (array_chunk($users, 4) as $user_set) : ?>
            <div class="row users">
                <?php foreach ($user_set as $user) : ?>
                    <div class="col-md-3 user-block">
                        <a href="profile.php?id=<?= e($user->id) ?>">
                                <img src="<?= !empty(e($user->avatar)) ? e($user->avatar) : get_avatar_url(e($user->email)) ?>"
                                     alt="<?= e($user->pseudo) ?>" class="avatar rounded-circle" width="50" height="50">
                        </a>

                        <h4 class="user-block-username">
                                <a href="profile.php?id=<?= e($user->id) ?>">
                                    <?= e($user->pseudo) ?>
                                </a>
                        </h4>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>

        <div id="pagination"><?= $pagination ?></div>

    </div>
</div>

<?php include('partials/_footer.php'); ?>
