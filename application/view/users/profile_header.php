<div class="row bg-faded align-items-center p-3 mb-4 ml-0 mr-0 rounded-bottom">
  <div class="col-4">
    <h4 class="mb-0"><a href="<?php echo URL . $user->userID ?>"><?php echo $user->first_name ?> <?php echo $user->last_name ?></a></h4>
  </div>
  <div class="col-8">
    <ul class="nav nav-fill">
      <li class="nav-item">
        <a class="nav-link <?php echo '' . (!isset($friend_userID) ? : 'text-muted') ?>" href="<?php echo URL . $user->userID ?>/friend">
          Friends
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo '' . (!isset($circle_userID) ? : 'text-muted') ?>" href="<?php echo URL . $user->userID ?>/circle">
          Circles
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo '' . (!isset($collection_userID) ? : 'text-muted') ?>" href="<?php echo URL . $user->userID ?>/collection">
          Collections
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo '' . (!isset($photo_userID) ? : 'text-muted') ?>" href="<?php echo URL . $user->userID ?>/photo">
          Photos
        </a>
      </li>

      <?php if ($this->current_userID != $user->userID) { ?>
      <li class="nav-item">
      <?php if($is_friend != NULL) { ?>
        <?php if($is_friend->status == 0) { ?>
          <button class="btn btn-secondary">Friends</button>
        <?php } else if($is_friend->status == 1) { ?>
          <?php if($initiator->userID == $this->current_userID) { ?>
              <button class="btn btn-secondary">Friend Request sent</button>
          <?php } else { ?>
              <a class="btn btn-primary" href="<?php echo URL ?>user/accept_friendships?userID=<?php echo $user->userID ?>">Accept Friend Request</a>
              <a class="btn btn-secondary" href="<?php echo URL ?>user/reject_friendships?userID=<?php echo $user->userID ?>">Reject</a>
          <?php } ?>
        <?php } ?>
      <?php } else {?>
          <a class="btn btn-primary" href="<?php echo URL ?>user/add_friend?userID=<?php echo $user->userID ?>">Add Friend</a>
      <?php } ?>
      </li>
      <?php } else { ?>
        <li class="nav-item">
          <?php require APP . 'view/users/form_edit_settings.php'; ?>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editSettings">
            Settings
          </button>
        </li>
      <?php } ?>

    </ul>
  </div>
</div>
