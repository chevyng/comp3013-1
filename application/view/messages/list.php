<?php if (count($messages) > 0) { ?>
<?php foreach ($messages as $message) { ?>
  <div class="card mb-3">
    <div class="card-block">
      <h6 class="card-title">
        <a href="<?php echo URL . $message->userID ?>"><?php echo user_name($message->userID) ?></a>
        <br><small class="text-muted"><?php echo $message->CREATED_AT ?></small>
      </h6>
      <p class="card-text"><?php echo $message->content ?></p>
    </div>
  </div>
<?php } ?>
<?php } ?>
