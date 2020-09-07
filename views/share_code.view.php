<?php $title = 'Partage de codes sources'; ?>
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
    #code
    {
        font-family: "Source Code Pro", sans-serif;
        width: 100%;
        min-height: 400px;
        border: none;
        outline: 0;
        background-color: rgba(11, 11, 25, 0.67);
        color: #c5c5c5;
        resize: none;
        font-size: 18px;
    }

    #main-content-share-code{
        padding-top: 1em;
        padding-left: 8px;
        position: relative;
    }
</style>
<div id="main-content">
    <div id="main-content-share-code">
        <form method="post" autocomplete="off">
            <textarea class="form-control" id="code" name="code" required="required" placeholder="Entrer votre code ici..."><?= $code; ?></textarea>
            <div class="btn-group nav">
                <a href="share_code.php" class="btn btn-danger">Tout effacer</a>
                <input type="submit" class="btn btn-success" value="Enregistrer" name="save"/>
            </div>

        </form>
    </div>
</div>

<!--<script src="assets/js/bootstrap.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/tabby.min.js"></script>
<script src="libraries/parsley/parsley.min.js"></script>

<script>
$("#code").tabby();
$("#code").height($(window).height() - 50 );
</script>

</body>

</html>

