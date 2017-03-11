<div class="row justify-content-center pt-4 pb-6">
  <div class="col-6">
  <div class="card">
    <div class="card-block">

      <h4 class="card-title mb-0"><?php echo $post->title ?></h4>

      <div class="mb-3">
        <span class="text-muted small">
          <a href="<?php echo URL . $post->userID ?>"><?php echo user_name($post->userID) ?></a> /
          <a href="<?php echo URL . 'blog/' . $post->blogID ?>"><?php echo $post->name ?></a>
          <strong><span class="align-top">.</span></strong>
          <?php echo $post->CREATED_AT ?>
        </span>
      </div>

      <p class="card-text"><?php echo $post->body ?></p>

      <?php if ($post->userID == $this->current_userID) { ?>
        <div class="bg-faded p-2">
          <button type="button" class="btn-link mr-2" data-toggle="modal" data-target="#editPost">
            Edit
          </button>
          <?php require APP . 'view/posts/edit_post.php'; ?>
          <a class="card-link text-danger" href="<?php echo URL . "post/delete?blogID="  . $post->blogID  . '&postID=' . $post->postID ?>">
            Delete
          </a>
        </div>
      <?php } ?>

    </div>
  </div>
  </div>
</div>
