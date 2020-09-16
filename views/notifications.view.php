<?php $title = "Notifications"; ?>
<?php include('partials/_header.php'); ?>

<style>
    .not_seen{
        background-color: #f2f2f2;
    }
</style>

<div id="main-content">
    <div class="container">
        <h1 class="lead">Vos notifications</h1>
        <ul class="list-group">
            <?php foreach($notifications as $notification): ?>
                <li class="list-group-item <?= $notification->seen == '0' ? 'not_seen' : '' ?>">
                    <?php require("partials/notifications/{$notification->name}.php"); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <div id="pagination"><?= $pagination ?></div>
    </div>
</div>

<script type='text/javascript'>
    var refresh = window.localStorage.getItem('refresh');
    if (refresh===null){
        window.location.reload();
        window.localStorage.setItem('refresh', "1");
    }
</script>
<?php include('partials/_footer.php'); ?>

