<div class="p-4">
  <div class="row">
    <div class="col-8">
      <img class="w-100" src="<?php echo URL . $photo->path ?>" onError="this.src ='<?php echo URL; ?>images/missing.jpg'"  />
    </div>
    <div class="col-4">
      <p class="p-2" style="min-height:150px;">
         <a href="<?php echo URL . $photo->userID ?>"><?php echo user_name($photo->userID) ?></a>
        <br>
        <small class="text-muted">
          Under <a href="<?php echo URL; ?>collection/<?php echo $photo->collectionID ?>">Collection <?php echo $photo->collectionID ?></a>
          <strong><span class="align-top">.</span></strong>
          <?php echo $photo->CREATED_AT ?>
        </small>
      </p>
      <div class="small m-2 p-2" style="border-top: 1px solid #DDD;">
        <?php if ($photo_user_Liked_photo) { ?>
            <a class="mr-2 text-danger" href="<?php echo URL; ?>photo/delete_photo_annotation?photoID=<?php echo $photoID; ?>&userID=<?php echo $this->current_userID; ?>">
              <i class="fa fa-heart mr-1 text-danger" aria-hidden="true"></i>Unlike
            </a>
        <?php } else { ?>
            <a class="mr-2" href="<?php echo URL; ?>photo/set_photo_annotation?photoID=<?php echo $photoID; ?>&userID=<?php echo $this->current_userID; ?>">
              <i class="fa fa-heart mr-1" aria-hidden="true"></i>Like
            </a>
        <?php } ?>
        <a class="mr-2" title="Leave a comment" href="#" onclick="setFocusToCommentInput();return false;">
          <i class="fa fa-comment mr-1" aria-hidden="true"></i>Comment
        </a>
      </div>
      <div class="bg-faded pr-2 pl-2 pb-3" style="border-top: 1px solid #DDD;">
        <div class="p-2 mb-2 small" style="border-bottom: 1px solid #DDD;">
          <?php if (count($photo_annotations) > 1) { ?>
            <i class="fa fa-heart mr-1" aria-hidden="true"></i>
            <a href="#"><?php echo user_name($photo_annotations[0]->userID) ?> and <?=(count($photo_annotations)-1)?> others</a>
          <?php } else if (count($photo_annotations) == 1) { ?>
            <i class="fa fa-heart mr-1" aria-hidden="true"></i>
            <a href="#"><?php echo user_name($photo_annotations[0]->userID) ?>
          <?php } ?>
        </div>
        <?php if (count($photo_comments) > 0) { ?>
          <div class="list-group mb-2">
          <?php foreach ($photo_comments as $comment) { ?>
            <div class="list-group-item list-group-item-action flex-column align-items-start">
              <p class="mb-1">
                <a href="<?php echo URL . $comment->userID ?>"><?php echo user_name($comment->userID) ?></a> <?php echo $comment->content ?>
              </p>
              <small class="text-muted"><?php echo $comment->CREATED_AT ?></small>
            </div>
          <?php } ?>
          </div>
        <?php } ?>
        <?php require APP . 'view/comments/form.php'; ?>
      </div>
    </div>
  </div>
</div>
