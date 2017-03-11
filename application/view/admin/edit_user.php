<div class="modal fade" id="edit<?php echo $user->userID ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User <?php echo $user->userID ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-right">
        <form action="<?php echo URL; ?>admin/update_user" method="POST">
          <div class="form-group">
            <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name ?>" placeholder="First Name" required />
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name ?>" placeholder="Last Name" required />
          </div>
          <div class="form-group">
            <input class="form-control" type="email" name="email" value="<?php echo $user->email ?>" placeholder="Email" required />
          </div>
          <input type="hidden" name="userID" value="<?php echo $user->userID ?>" />
          <input class="btn btn-primary w-25" type="submit" name="update" value="Update" />
        </form>
      </div>
    </div>
  </div>
</div>
