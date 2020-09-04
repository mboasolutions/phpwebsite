<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= set_active('index') ?>">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" <?= set_active('login') ?>>
                <a class="nav-link" href="login.php">Connexion</a>
            </li>
            <li class="nav-item <?= set_active('register') ?>">
                <a class="nav-link" href="register.php" tabindex="-1" aria-disabled="false">Inscription</a>
            </li>

        </ul>

    </div>
</nav>
