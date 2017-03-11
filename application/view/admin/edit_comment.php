<div class="modal fade" id="editComment<?php echo $comment->commentID ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Comment <?php echo $comment->commentID ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-right">
        <form action="<?php echo URL; ?>admin/update_comment" method="POST">
          <div class="form-group">
            <input class="form-control" type="text" name="content" value="<?php echo $comment->content ?>" placeholder="Comment" required />
          </div>
          <input type="hidden" name="commentID" value="<?php echo $comment->commentID?>" />
          <input class="btn btn-primary w-25" type="submit" name="update" value="Update" />
        </form>
      </div>
    </div>
  </div>
</div>
