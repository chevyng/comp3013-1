<div class="row mb-3">
  <div class="col-12">
    <h4>Photos</h4>
  </div>
</div>

<? if (count($photos) > 0) { ?>
  <div class="row">
  <?php foreach ($photos as $photo) { ?>
    <div class="col-3">
      <a href="<?= URL; ?>photo/<?= $photo->photoID ?>">
      <div class="card mb-3">
        <img class="card-img-top" src="<?= URL; ?><?= $photo->path ?>" onError="this.src ='<?= URL; ?>images/missing.jpg'" style="object-fit: cover; height: 200px;">
        <div class="card-block">
          <p class="card-text text-muted">Under Collection <?= $photo->collectionID ?></p>
        </div>
      </div>
      </a>
    </div>
  <?php } ?>
  </div>
<? } ?>
