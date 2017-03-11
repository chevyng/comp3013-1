<div class="modal fade" id="editSettings">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="text-left" action="<?php echo URL ?>user/update_user" method="POST">
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $user->first_name ?>" required />
          </div>
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name ?>" required />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $user->email ?>" required />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $user->password ?>" required />
          </div>
          <p class="mb-2">Who can see my stuff?</p>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="privacy" value=0 <?php if ($user->privacy == 0) {?> checked <?php } ?>>
              Friends of Friends
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="privacy" value=1 <?php if ($user->privacy == 1) {?> checked <?php } ?>>
              Public
            </label>
          </div>
          <input type="hidden" name="userID" value="<?php echo $user->userID ?>" />
          <input class="mt-2 btn btn-primary" type="submit" name="update" value="Update" />
        </form>
      </div>
    </div>
  </div>
</div>
