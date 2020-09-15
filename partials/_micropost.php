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
        <p><i class="fa fa-clock-o"></i>&nbsp;<span class="timeago" title="<?= e($micropost->created_at) ?>"><?= e($micropost->created_at) ?></span></p>
    </div>
</div>