<style>
    li.have_notifs a{
        color: red !important;
        font-weight: bold;
    }


    .display-box-user:hover a{
        background-color: #3b5998;
        color: white;
        cursor: pointer;
        text-decoration: none;
    }


    #display-results{
        position: fixed;
        display: none;
    }

    /*Hidden class for adding and removing*/
    .lds-dual-ring.hidden {
        display: none;
    }

    /*Add an overlay to the entire page blocking any further presses to buttons or other elements.*/
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0,0,0,.8);
        z-index: 999;
        opacity: 1;
        transition: all 0.5s;
    }

    /*Spinner Styles*/
    .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
    }
    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 5% auto;
        border-radius: 50%;
        border: 6px solid #fff;
        border-color: #fff transparent #fff transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }
    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<nav class="navbar navbar-expand-md navbar-dark bg-secondary fixed-top">
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
        <ul class="navbar-nav">
            <li class="nav-item">
                <input class="form-control mr-sm-3" type="search" placeholder="Rechercher un utilisateur" id="searchbox">
                <i class="fa fa-spinner fa-spin" style="display: none;" id="spinner"></i>
                <i id="loader" class="lds-dual-ring hidden overlay"></i>
                <div class="p-1 bg-light text-dark" id="display-results">

                </div>
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
            <li class="<?= $notifications_count > 0 ? 'have_notifs' : '' ?>">
                <a href="notifications.php"><i class="fa fa-bell"></i>
                    <?= $notifications_count > 0 ? "($notifications_count)" : ''; ?>
                </a>
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
