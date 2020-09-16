<a href="profile.php?id=<?= $notification->user_id ?>">
    <img src="<?= $notification->avatar ? $notification->avatar : get_avatar_url($notification->email) ?>" alt="Image de profil de <?= e($notification->pseudo) ?>" class="rounded-circle" width="25" height="25">
    <?= e($notification->pseudo) ?>
</a>
vous a envoyé une demande d'amitié <span class="timeago" title="<?= $notification->created_at ?>"><?= $notification->created_at ?></span><br>.
<div>
    <a class="btn btn-primary" href="accept_friend_request.php?id=<?= $notification->user_id ?>"><i class="fa fa-plus"></i> Accepter</a>
    <a class="btn btn-danger" href="delete_friend.php?id=<?= $notification->user_id ?>"><i class="fa fa-minus"></i> Decliner</a>
</div>