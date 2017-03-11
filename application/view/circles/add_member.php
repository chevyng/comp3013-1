<?php if ($friends_not_members != NULL && count($friends_not_members > 0)) { ?>

  <div class="row pl-2 pr-2 mt-2">
    <div class="col-12 text-muted small">ADD MEMBERS</div>
  </div>
  <div class="mt-2 mb-2" style="border-bottom: 1px solid #DDD;"></div>

  <form class="form-inline mt-3 mb-3" action="<?php echo URL ?>circle/add_member" method="POST">

  <select class="form-control w-75" name="userID">
    <?php foreach($friends_not_members as $friend) { ?>
      <option value="<?php echo $friend ?>"><?php echo user_name($friend) ?></option>
    <?php } ?>
  </select>

  <input type="hidden" name="circleID" value="<?php echo $circleID ?>" >
  <input class="btn btn-primary w-25" type="submit" name="add" value="Add" />

</form>
<?php } ?>
