<form class="row m-0 mb-3" action="<?php echo URL . 'blog/' . $blog->blogID ?>" method="GET">
  <input class="form-control col-11" type="text" name="q" placeholder="Search <?php echo $blog->name ?>" value="<?php if (isset($_GET['q'])) { echo $_GET['q']; } ?>" />
  <button class="btn btn-primary col-1" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
