<div class="modal fade" id="editPost">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post <?php echo $post->postID ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-right">
        <form action="<?php echo URL ?>post/update" method="POST">
          <input class="form-control mb-2" type="text" name="title" value="<?php echo $post->title ?>" placeholder="Title" required />
          <textarea class="form-control mb-2" type="text" name="body" rows="4" cols="50" required ><?php echo $post->body ?></textarea>
          <input type="hidden" name="postID" value="<?php echo $post->postID ?>" />
          <input class="btn btn-primary" type="submit" name="update" value="Update" />
        </form>
      </div>
    </div>
  </div>
</div>
