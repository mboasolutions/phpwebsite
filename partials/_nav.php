
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
            <li class="nav-item <?= set_active('list_users') ?>">
                <a class="nav-link" href="list_users.php"><?= $menu['liste-user'][$_SESSION['locale']] ?></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-5">
            <?php if (is_logged_in()) : ?>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= !empty(get_session('avatar')) ? get_session('avatar') : get_avatar_url(get_session('email')) ?>" alt="Image de <?= get_session('pseudo') ?>" class="rounded-circle" width="20" height="20""></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <ul class="navbar-nav">
                        <li class="nav-item <?= set_active('profile') ?>">
                           <a class="dropdown-item" href="profile.php?id=<?= get_session('user_id') ?>"><?= $menu['mon-profil'][$_SESSION['locale']] ?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item <?= set_active('change_password') ?>">
                            <a class="dropdown-item" href="change_password.php"><?= $menu['change-password'][$_SESSION['locale']] ?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item <?= set_active('edit_user') ?>">
                            <a class="dropdown-item" href="edit_user.php?id=<?= get_session('user_id') ?>"><?= $menu['editer-profil'][$_SESSION['locale']] ?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item <?= set_active('share_code') ?>">
                            <a class="dropdown-item" href="share_code.php"><?= $menu['share-code'][$_SESSION['locale']] ?></a>
                        </li>
                    </ul>
                <div class="dropdown-divider" ></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="dropdown-item" href="logout.php"><?= $menu['deconnexion'][$_SESSION['locale']] ?></a>
                        </li>
                    </ul>

                </div>
            </li>

            <?php else : ?>

                    <ul class="navbar-nav">
                        <li class="nav-item <?= set_active('login') ?>">
                            <a class="nav-link" href="login.php"><?= $menu['connexion'][$_SESSION['locale']] ?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item <?= set_active('register') ?>">
                            <a class="nav-link" href="register.php"><?= $menu['inscription'][$_SESSION['locale']] ?></a>
                        </li>
                    </ul>


            <?php endif ;?>

            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $menu['langue'][$_SESSION['locale']] ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <ul class="navbar-nav">
                            <li class="nav-item <?= set_active('?lang=fr') ?>">
                                <a class="dropdown-item" href="?lang=fr"><img src="assets/img/french.png" alt="French" class="img-circle" width="20" height="20">&nbsp;<?= $menu['francais'][$_SESSION['locale']] ?></a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item <?= set_active('?lang=en') ?>">
                                <a class="dropdown-item" href="?lang=en"><img src="assets/img/english.png" alt="English" class="img-circle" width="20" height=20">&nbsp;<?= $menu['anglais'][$_SESSION['locale']] ?></a>
                            </li>
                        </ul>
                    </div>
             </li>

        </ul>

    </div>
</nav>
