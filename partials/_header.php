<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reseau Social pour Developpeurs">
    <meta name="author" content="MboaSoft">
    <meta name="generator" content="MboaSoft v1.0.0">
    <title>
        <?=
        isset($title)
        ? $title .'- '. WEBSITE_NAME
            : WEBSITE_NAME.' - Simple, Rapide, Efficace !';
        ?>
    </title>

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css">-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="assets/css/font-awesome.min.css">-->
    <!--    <link rel="stylesheet" href="assets/css/bootstrap.min.css">-->

<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/superhero/bootstrap.min.css" integrity="sha384-HnTY+mLT0stQlOwD3wcAzSVAZbrBp141qwfR4WfTqVQKSgmcgzk+oP0ieIyrxiFO" crossorigin="anonymous">-->

    <link rel="stylesheet" href="assets/css/prettify.css">
    <link rel="stylesheet" href="assets/css/uploadify.css">
    <link rel="stylesheet" href="assets/css/main.css">
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cyborg/bootstrap.min.css" integrity="sha384-nEnU7Ae+3lD52AK+RGNzgieBWMnEfgTbRHIwEvp1XXPdqdO6uLTd/NwXbzboqjc2" crossorigin="anonymous">-->

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lte IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="bg-light">

<?php include('partials/_nav.php');?>
<?php include('partials/_flash.php');?>