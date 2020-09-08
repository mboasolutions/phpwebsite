
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item <?= set_active('index') ?>">
                <a class="nav-link" href="index.php"><?= $menu['accueil'][$_SESSION['locale']] ?> <span class="sr-only">(current)</span></a>
            </li>

            <?php if (is_logged_in()) : ;?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= get_avatar_url(get_session('email')) ?>" alt="Image de profile de <?= get_session('pseudo') ?>" class="img-circle" width="20" height="20""></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li class="nav-item <?= set_active('profile') ?>">
                            <a class="nav-link" href="profile.php?id="<?= get_session('user_id') ?>><?= $menu['mon-profil'][$_SESSION['locale']] ?><span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?= set_active('share_code') ?>">
                            <a class="nav-link" href="share_code.php"><?= $menu['share_code'][$_SESSION['locale']] ?><span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><?= $menu['deconnexion'][$_SESSION['locale']] ?><span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </li>

            <?php else : ; ?>
                <li class="nav-item" <?= set_active('login') ?>>
                    <a class="nav-link" href="login.php"><?= $menu['connexion'][$_SESSION['locale']] ?></a>
                </li>
                <li class="nav-item <?= set_active('register') ?>">
                    <a class="nav-link" href="register.php" tabindex="-1" aria-disabled="false"><?= $menu['inscription'][$_SESSION['locale']] ?></a>
                </li>

            <?php endif ;?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $menu['langue'][$_SESSION['locale']] ?></a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                    <li class="nav-item <?= set_active('?lang=fr') ?>">
                        <a class="nav-link" href="?lang=fr"><img src="assets/img/french.png" alt="French" class="img-circle" width="20" height="20">&nbsp;<?= $menu['francais'][$_SESSION['locale']] ?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= set_active('?lang=en') ?>">
                        <a class="nav-link" href="?lang=en"><img src="assets/img/english.png" alt="English" class="img-circle" width="20" height=20">&nbsp;<?= $menu['anglais'][$_SESSION['locale']] ?><span class="sr-only">(current)</span></a>
                    </li>

                </ul>
            </li>

        </ul>

    </div>
</nav>
