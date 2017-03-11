<?php require APP . 'view/users/profile_header.php'; ?>

<div class="card">
  <div class="card-block">

    <div class="row align-items-center">
      <div class="col-10"><h4><i class="fa fa-users mr-1 text-muted" aria-hidden="true"></i> Circles</h4></div>
      <div class="col-2 text-right">
        <?php if ($user->userID == $this->current_userID) { ?>
        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#newCircleModal">
          New Circle
        </button>
        <?php } ?>
      </div>
    </div>
    <div class="mt-3 mb-3" style="border-top: 1px solid #DDD;"></div>
    <?php require APP . 'view/circles/new_circle.php'; ?>
    <?php if ( (count($circlesAdmin) + count($circlesMember))  == 0) { ?>
      <p class="pl-1 pr-1 m-0">Not in any Circle.</p>
    <?php } else { ?>
      <div class="row align-items-top">
        <?php if (count($circlesAdmin) > 0) { ?>
        <?php foreach ($circlesAdmin as $circle) { ?>
          <div class="col-3">
            <div class="card mb-3 bg-faded">
              <div class="card-block">
                <h5 class="card-title"><?php echo $circle->name ?></h5>
                <p class="card-text">
                  <small class="text-muted">
                    <?php echo user_name($circle->userID) ?>
                  </small>
                </p>
                <a href="<?php echo URL; ?>circle/<?php echo $circle->circleID ?>" class="card-link">View Circle</a>
                <?php if ($this->current_userID == $circle->userID) { ?>
                  <a href="<?php echo URL; ?>circle/delete?circleID=<?php echo $circle->circleID?>" class="card-link">Delete</a>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php } ?>
        <?php if (count($circlesMember) > 0) { ?>
        <?php foreach ($circlesMember as $circle) { ?>
          <div class="col-3">
            <div class="card mb-3">
              <div class="card-block">
                <h5 class="card-title"><?php echo $circle->name ?></h5>
                <p class="card-text">
                  <small class="text-muted">
                    <?php echo user_name($circle->userID) ?>
                  </small>
                </p>
                <a href="<?php echo URL; ?>circle/<?php echo $circle->circleID ?>" class="card-link">View Circle</a>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>
