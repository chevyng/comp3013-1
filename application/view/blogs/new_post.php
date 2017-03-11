<div class="bg-faded p-3 text-right mb-3">
  <h6 class="text-left">Write Post</h6>
  <div class="mt-2 mb-2" style="border-bottom: 1px solid #DDD;"></div>
  <form action="<?php echo URL; ?>post/new_post" method="POST">
    <input class="form-control mb-2" type="text" name="title" value="" placeholder="Title" required />
    <textarea class="form-control mb-2" type="text" name="body" value="" rows="4" cols="50" required ></textarea>
    <input type="hidden" name="blogID" value="<?php echo $blog->blogID ?>" />
    <input class="btn btn-primary" type="submit" name="submit" value="Post" />
  </form>
</div>
