<div class="modal fade" id="newCircleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Circle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-inline" action="<?php echo URL ?>circle/new_circle">
          <input class="form-control w-75" type="text" name="name" value="" placeholder="Circle Name" required />
          <input class="btn btn-primary w-25" type="submit" name="submit" value="Create" />
        </form>
      </div>
    </div>
  </div>
</div>
