<?php $title = 'Accueil ';?>
<?php include('partials/_header.php');?>
<!-- /.container -->
<main role="main" class="container">

    <div class="jumbotron">
        <h1><?= WEBSITE_NAME;?></h1>
        <p class="lead"><?= WEBSITE_NAME;?> <?= $long_text['accueil_intro'][$_SESSION['locale']] ?> </p>
        <a href="register.php">
            <button class="btn btn-primary">Creer un compte</button>
        </a>
    </div>

    <button type="submit">
        <i class="fa fa-envelope" aria-hidden=”true”></i> Email Us!
    </button>

    <button type="submit">
        <i class="fa fa-arrow-right" title="Submit My Tax Return"></i>
    </button>

    <button type="submit">
        <i class="fa fa-arrow-right" title="Submit My Tax Return"></i>
        <span class="sr-only">Submit My Tax Return</span>
    </button>

    <button type="submit">
        <i class="fa fa-envelope"></i> Email Us!
    </button>

</main>

<?php include('partials/_footer.php');?>