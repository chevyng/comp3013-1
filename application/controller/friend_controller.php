<?php

require_once APP . 'model/user.php';
require_once APP . 'model/friend.php';

class FriendController
{

  function __construct()
  {
    if (isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      $this->current_userID = $_SESSION['current_user']->userID;
    }
  }

  public function user_index($friend_userID)
  {
    $model = new User();
    $user = $model->find_by_id($friend_userID);

    if (can_access_user($this->current_userID, $friend_userID) == false) {
      $_SESSION['message'] = 'You dont have rights to view friends of user ' . $user->userID;
      Redirect(URL);
    }

    $friendModel = new Friend();
    $is_friend = $model->is_friend($this->current_userID, $friend_userID);
    $initiator = $friendModel->friendship_initiator($this->current_userID, $friend_userID);

    $friendModel = new Friend();
    $friends = $friendModel->find_user_friend($friend_userID, 0);
    $friend_req_sent = $friendModel->find_friend_req_sent($friend_userID);
    $friend_req_received = $friendModel->find_friend_req_received($friend_userID);

    require APP . 'view/_templates/header.php';
    require APP . 'view/friends/index.php';
    require APP . 'view/_templates/footer.php';
  }

}

?>
