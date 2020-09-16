<div class="card text-white bg-secondary mb-3">
    <div class="card-header">
        <div class="row">
            <img src="<?= !empty(e($user->avatar)) ? e($user->avatar) : get_avatar_url(e($user->email)) ?>"
             alt="<?= e($user->pseudo) ?>" class="media-object rounded-circle" width="25" height="25"><h4 class="media-heading">&nbsp;<?= e($user->pseudo) ?></h4>
        </div>
    </div>
    <div class="card-body text-break">
        <p><?= nl2br(replace_links(e($micropost->content))) ?></p>
    </div>
    <div class="card-footer">
        <p><i class="fa fa-clock-o"></i>&nbsp;<span class="timeago" title="<?= e($micropost->created_at) ?>"><?= e($micropost->created_at) ?></span>
            <?php if (!empty($_GET['id']) && $_GET['id'] == get_session('user_id')): ?>
                <a data-confirm="Voulez-vous vraiment supprimer cette publication ?" href="delete_micropost.php?id=<?= $micropost->id ?>">&nbsp;<i class="fa fa-trash"></i> Supprimer</a>
            <?php endif; ?>
        </p>
    </div>
</div>