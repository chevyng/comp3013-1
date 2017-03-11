<?php

require_once APP . 'model/blog.php';

class BlogController
{

  function __construct()
  {
    if (isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      $this->current_userID = $_SESSION['current_user']->userID;
    }
  }

  public function user_index($blog_userID)
  {
    $_SESSION['message'] = URL . 'blog does not exist.';
    Redirect(URL);
  }

  public function view($blogID)
  {
    $model = new Blog();
    $blog = $model->find_by_id($blogID);

    if (!$blog) {
      $_SESSION['message'] = 'Blog ' . $blogID . ' does not exist.';
      Redirect(URL);
    }

    if (isset($_GET['q']) && strlen($_GET['q']) > 0) {

      $query = $_GET['q'];
      $blog_posts = $model->search_blog_posts($blogID, $query);

    } elseif (isset($_GET['q']) && strlen($_GET['q']) == 0) {

      Redirect(URL . 'blog/' . $blogID);

    } else {
      $blog_posts = $model->find_blog_posts($blogID);
    }

    require APP . 'view/_templates/header.php';
    require APP . 'view/blogs/view.php';
    require APP . 'view/_templates/footer.php';
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];

      $model = new Blog();
      $result = $model->create($this->current_userID,
                               $name);
      if ($result) {
        $_SESSION['message'] = 'Blog created successfully';
      } else {
        $_SESSION['message'] = 'Fail to create blog';
      }
      Redirect(URL . $this->current_userID);

    } else {
      Redirect(URL);
    }
  }

}
?>
