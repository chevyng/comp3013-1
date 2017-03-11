<?php if ($this->current_userID == $collection->userID) { ?>
<!-- Only collection's owner can edit rights -->
  <div class="modal fade" id="editSettings">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Collection's Settings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="text-left" action="<?php echo URL ?>collection/update" method="POST">
            <div class="form-group">
              <label for="accessRights">Access Rights:</label>
              <select class="form-control" name="accessRights" id="accessRights">
                <?php foreach($privacy as $key=>$privacy_type) { ?>
                    <?php if ($key == $collection->accessRights) { ?>
                      <option selected value="<?php echo $key ?>"><?php echo $privacy_type ?></option>
                    <?php } else { ?>
                      <option value="<?php echo $key ?>"><?php echo $privacy_type ?></option>
                    <?php } ?>
                <?php } ?>
              </select>
            </div>

            <?php if ($collection->accessRights != 2) { ?>
              <p class="mb-1">Circles:</p>
              <?php foreach($all_user_circles as $circle) { ?>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="accessCircles[]" value="<?php echo $circle->circleID ?>" <?php if(in_array_field($circle->circleID, 'circleID', $current_access_circles)){ ?> checked <?php } ?>>
                    <?php echo $circle->name ?>
                  </label>
                </div>
              <?php } ?>
            <?php } ?>

            <input type="hidden" name="collectionID" value="<?php echo $collection->collectionID ?>" >
            <input class="mt-2 btn btn-primary" type="submit" name="update" value="Update" />
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
