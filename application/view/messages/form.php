<div class="bg-faded p-3 text-right mb-3">
  <h6 class="text-left">Write Message</h6>
  <div class="mt-2 mb-2" style="border-bottom: 1px solid #DDD;"></div>
  <form action="<?php echo URL; ?>message/create" method="POST">
  <textarea class="form-control mb-2" row="4" name="content" placeholder="Write something..." value="" required></textarea>
  <input type="hidden" name="circleID" value="<?php echo $circleID ?>" />
  <input class="btn btn-primary" type="submit" name="submit" value="Send" />
  </form>
</div>
