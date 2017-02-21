<?php

require_once APP . 'model/post.php';

class PostController
{

  function __construct()
  {
    if (isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      $this->current_userID = $_SESSION['current_user']->userID;
    }
  }

  public function index()
  {
    // TODO: show list of all posts for admon
    // otherwise 404 page
  }

  public function user_index($post_userID)
  {
    // TODO: show 404 page
  }

  public function view($postID)
  {
    // display photos from single collection
    $model = new Post();
    $post = $model->find_by_id($postID);

    require APP . 'view/_templates/header.php';
    require APP . 'view/posts/view.php';
    require APP . 'view/_templates/footer.php';

  }

  public function new()
  {

    if (isset($_GET['blogID']) && strlen($_GET['blogID']) > 0) {

      $blogID = $_GET['blogID'];

      require APP . 'view/_templates/header.php';
      require APP . 'view/posts/new.php';
      require APP . 'view/_templates/footer.php';

    } else if (isset($_POST['submit'])) {

      // TODO: check if current_userID is the owner of blogID

      $blogID = $_POST['blogID'];
      $title = $_POST['title'];
      $body = $_POST['body'];

      $model = new Post();
      $result = $model->create($blogID,
                               $title,
                               $body);

      if ($result) {
        $_SESSION['message'] = 'Post created successfully';
        Redirect(URL . 'blog/' . $blogID);
      } else {
        $_SESSION['message'] = 'Fail to create post';
        Redirect(URL . 'post/new?blogID=' . $blogID);
      }

    } else {

      $_SESSION['message'] = 'No Blog ID';
      Redirect(URL);

    }

  }

}
?>
