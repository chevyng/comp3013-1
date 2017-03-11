<?php

require_once APP . 'model/message.php';

class MessageController
{

  function __construct()
  {
    if (isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      $this->current_userID = $_SESSION['current_user']->userID;
    }
  }

  public function user_index($message_userID)
  {
    $_SESSION['message'] = URL . 'message does not exist.';
    Redirect(URL);
  }

  public function create()
  {
    if (isset($_POST['submit'])) {

      $circleID = $_POST['circleID'];
      $content = $_POST['content'];

      // insert into database
      $model = new Message();
      $result = $model->create($this->current_userID,
                              $circleID,
                              $content);
      if ($result) {
        $_SESSION['message'] = 'Message sent successfully';
        Redirect(URL . 'circle/' . $circleID);
      } else {
        $_SESSION['message'] = 'Fail to send message';
        Redirect(URL . 'circle/' . $circleID);
      }

    } else {
      $_SESSION['message'] = 'Missing required POST header';
      Redirect(URL);
    }
  }

}

?>
