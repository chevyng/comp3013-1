<?php

require_once APP . 'model/user.php';
require_once APP . 'model/post.php';

class SearchController
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
    if (isset($_GET['query']) && strlen($_GET['query']) > 0) {
      $query = $_GET['query'];

      $model = new User();
      $users = $model->find_by_name($query);

      $post_model = new Post();
      $posts = $post_model->search_post($query,
                                        $this->current_userID);

      require APP . 'view/_templates/header.php';
      require APP . 'view/search/result.php';
      require APP . 'view/_templates/footer.php';
    } else {
      Redirect(URL);
    }
  }


}
?>
