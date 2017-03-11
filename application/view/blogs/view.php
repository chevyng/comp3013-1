<div class="p-4">
  <div class="row">
    <div class="col-8">
  <h6>
    <span class="text-muted">
      <i class="fa fa-pencil-square-o mr-1 text-muted" aria-hidden="true"></i>
      <a href="<?php echo URL . $blog->userID ?>"><?php echo user_name($blog->userID) ?></a>'s Blog:
    </span>
      <?php echo $blog->name ?>
  </h6>
  <div class="mt-3 mb-3" style="border-top: 1px solid #DDD;"></div>
  <?php if ($this->current_userID == $blog->userID) {?>
    <?php require APP . 'view/blogs/new_post.php'; ?>
  <?php } ?>
  <?php require APP . 'view/blogs/search.php' ?>
  <?php if (isset($_GET['q']) && count($blog_posts) == 0) { ?>
    <p class="mb-3 p-3 bg-warning rounded">Opps! No result for '<?php echo $_GET['q'] ?>'.</p>
  <?php } ?>
  <?php if (count($blog_posts) > 0) { ?>
    <?php foreach ($blog_posts as $post) { ?>
      <div class="card mb-3">
        <div class="card-block">
          <h6 class="card-title">
            <a href="<?php echo URL . 'post/' . $post->postID ?>"><?php echo $post->title ?></a>
            <br><small class="text-muted"><?php echo $post->CREATED_AT ?></small>
          </h6>
          <p class="card-text"><?php echo nl2br($post->body) ?></p>
        </div>
      </div>
    <?php } ?>
  <?php } ?>
  </div>
</div>
