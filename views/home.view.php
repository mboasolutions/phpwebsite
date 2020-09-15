<html>

<head>
    <title><h1>Tesst de la fonction : relation_link_to_display</h1></title>
    <link href="asset/css/dropzone.css" type="text/css" rel="stylesheet" />
    <script src="asset/js/dropzone.min.js"></script>>

</head>

<body>
<h1>Tesst de la fonction : relation_link_to_display</h1

<form action="views/home.php" class="dropzone">
    <div><?= relation_link_to_display($_GET['id']) ?></div>
</form>

</body>

</html>>