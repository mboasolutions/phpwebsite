<?php $title = 'Accueil ';?>
<?php include('includes/constants.php');?>
<?php include('partials/_header.php');?>
<!-- /.container -->
<main role="main" class="container">

    <div class="jumbotron">
        <h1><?= WEBSITE_NAME;?></h1>
        <p class="lead"><?= WEBSITE_NAME;?> est le reseau social des developpeurs ⌨<br>
            et qui dit developpeur, dit egalement code source ! ✍
            Grace a cette plate forme, vous avez la possibilite de tisser des liens d'amitie avec d'autres developpeurs,
            echanger les codes sources, recevoir de l'aide si vous rencontrez des problemes sur l'un de vos projets
            et bien plus encore !<br>
            Alors n'hesitez plus et <a href="register.php"><strong>rejoignez des maintenant la communaute Boom</strong></a> ! ♺<br></p>
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