<div class="modal fade" id="editCircle<?php echo $circle->circleID ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Circle <?php echo $circle->circleID ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-right">
        <form action="<?php echo URL ?>circle/update_circle" method="POST">
          <div class="form-group">
            <input class="form-control" type="text" name="name" value="<?php echo $circle->name ?>" placeholder="Circle Name" required />
          </div>
          <input type="hidden" name="circleID" value="<?php echo $circle->circleID ?>" />
          <input class="btn btn-primary w-25" type="submit" name="update" value="Update" />
        </form>
      </div>
    </div>
  </div>
</div>
