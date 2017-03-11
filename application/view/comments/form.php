<form class="form-inline justify-content-end" action="<?php echo URL ?>comment/create" method="POST">
  <input class="form-control w-100 mb-2" id="comment_input" type="text" name="content" value="" placeholder="Write a comment..." required />
  <input type="hidden" name="photoID" value="<?php echo $photoID ?>" />
  <input class="btn btn-primary pull-right" type="submit" name="submit" value="Submit" />
</form>

<script>
function setFocusToCommentInput(){
    document.getElementById("comment_input").focus();
}
</script>
