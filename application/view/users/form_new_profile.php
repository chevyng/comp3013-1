<div class="modal fade" id="newProfile">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo URL ?>user/new_profile" method="POST">
        <div class="form-group">
          <textarea class="form-control" type="text" name="about" rows="4" cols="40" placeholder="Tell us more about yourself!" required></textarea>
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="gender" value="" placeholder="Gender" required />
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="birthdate" value="" placeholder="Birth date YYYY-MM-DD" required />
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="current_city" value="" placeholder="Current City" required />
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="home_city" value="" placeholder="Home City" required />
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="address" value="" placeholder="Address" required />
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="languages" value="" placeholder="Languages" required />
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="workplace" value="" placeholder="Workplace" required />
        </div>
        <input type="hidden" name="userID" value="<?php echo $user->userID ?>" />
        <input class="btn btn-primary" type="submit" name="submit" value="Update" />
      </form>
      </div>
    </div>
  </div>
</div>
