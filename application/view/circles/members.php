<?php foreach ($members as $member) { ?>
  <div class="row pl-2 pr-2 mb-1 mt-1">
   <div class="col-5">
      <a href="<?php echo URL . $member->userID ?>"><?php echo user_name($member->userID) ?></a>
   </div>
   <div class="col-7 text-right">
     <?php if ($member->userID == $circle->userID) { ?>
       Owner
     <?php } else if ($this->current_userID == $circle->userID) { ?>
       <a href="<?php echo URL . 'circle/remove_member?userID=' . $member->userID . '&circleID=' . $circleID ?>">
         Remove
       </a>
      <?php } ?>
   </div>
 </div>
<?php } ?>
