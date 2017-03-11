<div class="modal fade" id="editPost<?php echo $post->postID ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post <?php echo $post->postID ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-right">
        <form action="<?php echo URL; ?>admin/update_post" method="POST">
          <div class="form-group">
            <input class="form-control" type="text" name="title" value="<?php echo $post->title ?>" placeholder="Title" required />
          </div>
          <textarea class="form-control mb-2" type="text" name="body" value="" rows="4" cols="50" required ><?php echo $post->body ?></textarea>
          <input type="hidden" name="postID" value="<?php echo $post->postID ?>" />
          <input class="btn btn-primary w-25" type="submit" name="update" value="Update" />
        </form>
      </div>
    </div>
  </div>
</div>
