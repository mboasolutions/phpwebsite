<div class="card text-dark bg-light mb-3" id="micropost<?= $micropost->m_id ?>">
    <div class="card-header">
        <div class="row">
            <img src="<?= !empty(e($micropost->avatar)) ? e($micropost->avatar) : get_avatar_url(e($micropost->email)) ?>"
             alt="<?= e($micropost->pseudo) ?>" class="media-object rounded-circle" width="25" height="25"><h4 class="media-heading">&nbsp;<?= e($micropost->pseudo) ?></h4>
        </div>
    </div>
    <div class="card-body text-break">
        <p><?= nl2br(replace_links(e($micropost->content))) ?></p>
    </div>
    <div class="card-footer">
        <p><i class="fa fa-clock-o"></i>&nbsp;<span class="timeago" title="<?= e($micropost->created_at) ?>"><?= e($micropost->created_at) ?></span>
            <?php if($micropost->user_id == get_session('user_id')): ?>
                <a class="text-danger" data-confirm="Voulez-vous vraiment supprimer cette publication ?" href="delete_micropost.php?id=<?= $micropost->m_id ?>">&nbsp;<i class="fa fa-trash"></i> Supprimer</a>
            <?php endif; ?>
        </p>
        <hr>
        <p>&nbsp;
            <?php if(user_already_like_the_micropost($micropost->m_id)): ?>
                <a id="unlike<?= $micropost->m_id ?>" data-action="unlike" class="like" href="unlike_micropost.php?id=<?= $micropost->m_id ?>">&nbsp;<i class="fa fa-thumbs-up"></i> Je n'aime plus</a>
            <?php else: ?>
                <a id="like<?= $micropost->m_id ?>" data-action="like" class="like" href="like_micropost.php?id=<?= $micropost->m_id ?>">&nbsp;<i class="fa fa-thumbs-up"></i> J'aime</a>
            <?php endif; ?>
        </p>
        Nombre de j'aime (<?= get_like_count($micropost->m_id) ?>)
        <div id="likers_<?= $micropost->m_id?>">
            <?= get_likers_text($micropost->m_id) ?>
        </div>
    </div>
</div>