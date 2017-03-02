<? require APP . 'view/users/profile_header.php'; ?>

<div class="card">
  <div class="card-block">
    <div class="row align-items-center mb-3">
      <div class="col-10"><h4>Photo Collections</h4></div>
      <div class="col-2 text-right">
        <? if ($user->userID == $this->current_userID) { ?>
        <a class="btn btn-sm btn-secondary" href="<?= URL; ?>collection/create">New Collection</a>
        <? } ?>
      </div>
    </div>
    <div class="mt-3 mb-3" style="border-top: 1px solid #DDD;"></div>
    <h3>Collections I own</h3>
    <? if ($collections_owned != NULL) { ?>
    <div class="row">
    <? $privacy = array('Friends', 'Friends of Friends', 'Public'); ?>
    <?php foreach ($collections_owned as $collection) { ?>
      <div class="col-3">
        <div class="card mb-3">
          <img class="card-img-top" src="<?= URL; ?>images/missing.jpg" style="object-fit: cover; height: 200px;">
          <div class="card-block">
            <h5 class="card-title">Collection <?= $collection->collectionID ?></h5>
            <p class="card-text text-muted">
              <?= $collection->accessRights . ' - ' . $privacy[$collection->accessRights] ?>
            </p>
            <a href="<?= URL; ?>collection/<?= $collection->collectionID ?>" class="card-link">View Collection</a>
            <a href="<?= URL; ?>collection/delete?collectionID=<?= $collection->collectionID ?>" class="card-link">Delete</a>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
    <? } ?>

    <h3>Collections I can view</h3>
    <? if ($collections_access != NULL) { ?>
    <div class="row">
    <? $privacy = array('Friends', 'Friends of Friends', 'Public'); ?>
    <?php foreach ($collections_access as $collection) { ?>
      <div class="col-3">
        <div class="card mb-3">
          <img class="card-img-top" src="<?= URL; ?>images/missing.jpg" style="object-fit: cover; height: 200px;">
          <div class="card-block">
            <h5 class="card-title">Collection <?= $collection->collectionID ?></h5>
            <a href="<?= URL; ?>collection/<?= $collection->collectionID ?>" class="card-link">View Collection</a>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
    <? } ?>
  </div>
</div>
