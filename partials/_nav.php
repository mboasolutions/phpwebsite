<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?= set_active('index') ?>">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>

            <?php if (is_logged_in()) : ;?>
                <li class="nav-item <?= set_active('profile') ?>">
                    <a class="nav-link" href="profile.php?id="<?= get_session('user_id') ?>>Mon profil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?= set_active('share_code') ?>">
                    <a class="nav-link" href="share_code.php">Partager<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Deconnexion<span class="sr-only">(current)</span></a>
                </li>
            <?php else : ; ?>
                <li class="nav-item" <?= set_active('login') ?>>
                    <a class="nav-link" href="login.php">Connexion</a>
                </li>
                <li class="nav-item <?= set_active('register') ?>">
                    <a class="nav-link" href="register.php" tabindex="-1" aria-disabled="false">Inscription</a>
                </li>

            <?php endif ;?>

        </ul>

    </div>
</nav>
