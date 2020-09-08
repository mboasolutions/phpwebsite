<?php $title = 'Affichage de codes sources'; ?>
<?php include('partials/_header.php'); ?>
<!-- /.container -->
<style>
    @import url(http://fonts.googleapis.com/css?family=Source+Code+Pro);
    .nav
    {
    top: 10px;
    right: 10px;
    position: absolute;
    }

    #main-content-share-code{
        font-family: "Source Code Pro", sans-serif;
        padding-top: 1em;
        padding-left: 8px;
        position: relative;
        background-color: rgba(11, 11, 25, 0.67);
        font-size: 18px;
    }
</style>

<div id="main-content">
    <div id="main-content-share-code">
        <pre id="main-content-share-code" class="prettyprint linenums"><?= e($data->code) ?></pre>

        <div class="btn-group nav">
            <a href="share_code.php?id=<?= e($_GET['id']) ?>" class="btn btn-warning">Cloner</a>
            <a href="share_code.php" class="btn btn-primary">Nouveau</a>

        </div>

    </div>
</div>

<!--<script src="assets/js/bootstrap.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/prettify.js"></script>

<script>
   //prettyPrint();
</script>

</body>

</html>


