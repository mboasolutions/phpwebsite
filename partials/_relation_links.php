<?php if(relation_link_to_display($_GET['id']) == CANCEL_RELATION_LINK): ?>
    <p>Une demande d'amitie a deja ete envoyee !</p>
    <a href="delete_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-danger float-right"><i class="fa fa-minus"></i>&nbsp;Annuler la demande</a>

<?php elseif (relation_link_to_display($_GET['id']) == ACCEPT_REJECT_RELATION_LINK): ?>
    Accepter ou rejeter la demande d'ami?
    <a href="accept_friend_request.php?id=<?= $_GET['id'] ?>" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Accepter la demande</a>
    <a href="delete_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-danger float-right"><i class="fa fa-minus"></i>&nbsp;Decliner la demande</a>

<?php elseif (relation_link_to_display($_GET['id']) == DELETE_RELATION_LINK): ?>
    Vous etes deja amis.Retirer de ma liste d'amis?
    <a href="delete_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-danger float-right"><i class="fa fa-minus"></i>&nbsp;Retirer de ma liste d'amis</a>
<?php else: ?>
    <a href="add_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i>&nbsp;Ajouter comme ami</a>
<?php endif;?>


