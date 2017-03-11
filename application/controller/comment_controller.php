<?php

require_once APP . 'model/comment.php';

class CommentController
{

  function __construct()
  {
    if (isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      $this->current_userID = $_SESSION['current_user']->userID;
    }
  }

  public function user_index($comment_userID)
  {
    $_SESSION['message'] = URL . 'comment does not exist.';
    Redirect(URL);
  }

  public function create()
  {
    if (isset($_POST['submit'])) {

      $photoID = $_POST['photoID'];
      $content = $_POST['content'];

      // insert into database
      $model = new Comment();
      $result = $model->create($this->current_userID,
                              $photoID,
                              $content);
      if ($result) {
        $_SESSION['message'] = 'Comment added successfully';
        Redirect(URL . 'photo/' . $photoID);
      } else {
        $_SESSION['message'] = 'Fail to add comment';
        Redirect(URL . 'photo/' . $photoID);
      }

    } else {
      $_SESSION['message'] = 'Missing required POST header';
      Redirect(URL);
    }
  }

}

?>
