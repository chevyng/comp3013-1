<div class="modal fade" id="editCollection<?php echo $collection->collectionID ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Collection <?php echo $collection->collectionID ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-right">
        <form action="<?php echo URL; ?>admin/update_collection" method="POST">
          <div class="form-group">
            <input class="form-control" type="text" name="accessRights" value="<?php echo $collection->accessRights ?>" placeholder="Access Rights" required />
          </div>
          <input type="hidden" name="collectionID" value="<?php echo $collection->collectionID ?>" />
          <input class="btn btn-primary w-25" type="submit" name="update" value="Update" />
        </form>
      </div>
    </div>
  </div>
</div>
