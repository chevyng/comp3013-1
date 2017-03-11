<div class="pt-4 pb-5">
  <h3 class="mb-3">Admin Console</h3>

  <ul class="nav nav-tabs" id="adminTabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#users" role="tab">
        Users <span class="text-muted"><?php echo count($users) ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#profiles" role="tab">
        Profiles <span class="text-muted"><?php echo count($profiles) ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#posts" role="tab">
        Posts <span class="text-muted"><?php echo count($posts) ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#circles" role="tab">
        Circles <span class="text-muted"><?php echo count($circles) ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#members" role="tab">
        Members <span class="text-muted"><?php echo count($members) ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
        Messages <span class="text-muted"><?php echo count($messages) ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#collections" role="tab">
        Photo Collections <span class="text-muted"><?php echo count($collections) ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#photos" role="tab">
        Photos <span class="text-muted"><?php echo count($photos) ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#comments" role="tab">
        Comments <span class="text-muted"><?php echo count($comments) ?></span>
      </a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="users" role="tabpanel">
      <?php require APP . 'view/admin/users.php'; ?>
    </div>
    <div class="tab-pane" id="profiles" role="tabpanel">
      <?php require APP . 'view/admin/profiles.php'; ?>
    </div>
    <div class="tab-pane" id="posts" role="tabpanel">
      <?php require APP . 'view/admin/posts.php'; ?>
    </div>
    <div class="tab-pane" id="circles" role="tabpanel">
      <?php require APP . 'view/admin/circles.php'; ?>
    </div>
    <div class="tab-pane" id="members" role="tabpanel">
      <?php require APP . 'view/admin/members.php'; ?>
    </div>
    <div class="tab-pane" id="messages" role="tabpanel">
      <?php require APP . 'view/admin/messages.php'; ?>
    </div>
    <div class="tab-pane" id="collections" role="tabpanel">
      <?php require APP . 'view/admin/collections.php'; ?>
    </div>
    <div class="tab-pane" id="photos" role="tabpanel">
      <?php require APP . 'view/admin/photos.php'; ?>
    </div>
    <div class="tab-pane" id="comments" role="tabpanel">
      <?php require APP . 'view/admin/comments.php'; ?>
    </div>
  </div>

  <script>
    $(function () {
      $('#adminTabs a:last').tab('show')
    })
  </script>

</div>
