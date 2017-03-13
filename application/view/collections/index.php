<?php require APP . 'view/users/profile_header.php'; ?>

<div class="card">
  <div class="card-block">
    <div class="row align-items-center mb-3">
      <div class="col-10"><h4><i class="fa fa-folder mr-1 text-muted" aria-hidden="true"></i> Photo Collections</h4></div>
      <div class="col-2 text-right">
        <?php if ($user->userID == $this->current_userID) { ?>
          <a class="btn btn-sm btn-secondary" href="<?php echo URL; ?>collection/create">New Collection</a>
        <?php } ?>
      </div>
    </div>
    <div class="mt-3 mb-3" style="border-top: 1px solid #DDD;"></div>
      <?php if ($collections_owned != NULL) { ?>
        <div class="row">
        <?php $privacy = array('Friends', 'Friends of Friends', 'Public'); ?>
        <?php foreach ($collections_owned as $collection) { ?>
          <?php if (in_array($collection->collectionID, array_column($collections_access, "collectionID"))) { ?>
            <div class="col-3">
              <div class="card mb-3">
                <img class="card-img-top" src="<?php echo URL . $collection->coverPhoto ?>" onError="this.src='<?php echo URL ?>images/missing.jpg'" style="object-fit: cover; height: 200px;">
                <div class="card-block">
                  <h5 class="card-title">Collection <?php echo $collection->collectionID ?></h5>
                  <p class="card-text text-muted">
                    <?php echo $collection->noOfPhotos ?> photos
                  </p>
                  <a href="<?php echo URL; ?>collection/<?php echo $collection->collectionID ?>" class="card-link">View Collection</a>
                  <?php if ($user->userID == $this->current_userID) { ?>
                    <a href="<?php echo URL; ?>collection/delete?collectionID=<?php echo $collection->collectionID ?>" class="card-link">Delete</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>
