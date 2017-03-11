<div class="modal fade" id="editProfile">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo URL; ?>user/update_profile" method="POST">
        <div class="form-group row">
          <label class="col-sm-3">About you</label>
          <div class="form-group col-sm-9">
          <textarea class="form-control" type="text" name="about" rows="4" cols="40" placeholder="Tell us more about yourself!" required><?php echo $profile->about ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3">Gender</label>
          <div class="form-group col-sm-9">
            <input class="form-control" type="text" name="gender" value="<?php echo $profile->gender ?>" placeholder="Gender" required />
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3">Birthdate</label>
          <div class="form-group col-sm-9">
            <input class="form-control" type="date" name="birthdate" value="<?php echo $profile->birthdate ?>" placeholder="Birth date YYYY-MM-DD" required />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3">Current City</label>
          <div class="form-group col-sm-9">
              <input class="form-control" type="text" name="current_city" value="<?php echo $profile->current_city ?>" placeholder="Current City" required />
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3">Home City</label>
          <div class="form-group col-sm-9">
              <input class="form-control" type="text" name="home_city" value="<?php echo $profile->home_city ?>" placeholder="Home City" required />
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3">Address</label>
          <div class="form-group col-sm-9">
              <input class="form-control" type="text" name="address" value="<?php echo $profile->address ?>" placeholder="Address" required />
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3">Languages</label>
          <div class="form-group col-sm-9">
            <input class="form-control" type="text" name="languages" value="<?php echo $profile->languages ?>" placeholder="Languages" required />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3">Work place</label>
          <div class="form-group col-sm-9">
            <input class="form-control" type="text" name="workplace" value="<?php echo $profile->workplace ?>" placeholder="Workplace" required />
          </div>
        </div>
        <input type="hidden" name="userID" value="<?php echo $userID ?>" />
        <input class="btn btn-primary" type="submit" name="submit" value="Update" />
      </form>
      </div>
    </div>
  </div>
</div>
