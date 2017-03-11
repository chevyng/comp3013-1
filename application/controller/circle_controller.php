<?php

require_once APP . 'model/user.php';
require_once APP . 'model/friend.php';

require_once APP . 'model/circle.php';

class CircleController
{

  function __construct()
  {
    if (isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      $this->current_userID = $_SESSION['current_user']->userID;
    }
  }

  public function user_index($circle_userID)
  {
    $model = new User();
    $user = $model->find_by_id($circle_userID);

    if (can_access_user($this->current_userID, $circle_userID) == false) {
      $_SESSION['message'] = 'You dont have rights to view circles of user ' . $user->userID;
      Redirect(URL);
    }

    $friendModel = new Friend();
    $is_friend = $model->is_friend($this->current_userID, $circle_userID);
    $initiator = $friendModel->friendship_initiator($this->current_userID, $circle_userID);

    $model = new Circle();
    $circlesAdmin = $model->find_user_circle_admin($circle_userID);
    $circlesMember = $model->find_user_circle_member($circle_userID);

    require APP . 'view/_templates/header.php';
    require APP . 'view/circles/index.php';
    require APP . 'view/_templates/footer.php';
  }

  public function view($circleID)
  {
    // display photos from single collection
    $model = new Circle();
    $circle = $model->find_circle_by_ID($circleID);

    if ($circle == NULL) {
      $_SESSION['message'] = 'Circle ' . $circleID . ' does not exist';
      Redirect(URL . 'circle');
    }

    $members = $model->find_members_by_circleID($circleID);
    $members_id = array_column($members, 'userID');
    if (!in_array($this->current_userID, $members_id)) {
      $_SESSION['message'] = 'You are not member of Circle ' . $circleID;
      Redirect(URL . 'circle');
    }

    $friend_model = new Friend();
    $friends = $friend_model->find_user_friend($this->current_userID, 0);
    $friends_id  = array_column($friends, 'userID');

    $friends_not_members = NULL;
    if ($friends != NULL) {
      $friends_not_members = array_diff($friends_id, $members_id);
    }

    $messages = $model->find_messages_by_circleID($circleID);

    require APP . 'view/_templates/header.php';
    require APP . 'view/circles/view.php';
    require APP . 'view/_templates/footer.php';
  }

  public function new_circle()
  {
    if (isset($_GET['name'])) {

      $circle_name = $_GET['name'];
      $model = new Circle();
      $result = $model->create($circle_name,
                               $this->current_userID);

      if ($result) {
        $_SESSION['message'] = 'Circle created!';
        $name = $model->find_circleID_by_name($circle_name);
        $addUser = $model->add_circle_member($name->circleID,$this->current_userID);
        $_SESSION['message'] = 'Member added!';
      } else {
        $_SESSION['message'] = 'Fail to create circle!';
      }
    }

    Redirect(URL . 'circle');
  }

  public function update_circle()
  {
    if (isset($_POST['update'])) {

      $name = $_POST['name'];
      $circleID = $_POST['circleID'];

      $model = new Circle();
      $result = $model->update_circle($name,
                                    $circleID,
                                    $this->current_userID);

      if ($result) {
        $_SESSION['message'] = 'Circle name updated!';
      } else {
        $_SESSION['message'] = 'Fail to update circle name!';
      }

      Redirect(URL . 'circle/' . $circleID);

    } else {
      Redirect(URL . 'circle');
    }

  }

  public function add_member()
  {
    if (isset($_POST['add'])) {

      $userID = $_POST['userID'];
      $circleID = $_POST['circleID'];

      $model = new Circle();
      $result = $model->add_circle_member($circleID,
                                          $userID);

      if ($result) {
        $_SESSION['message'] = user_name($userID) . ' added!';
      } else {
        $_SESSION['message'] = 'Fail to add ' . user_name($userID);
      }

      Redirect(URL . 'circle/' . $circleID);

    } else {
        Redirect(URL . 'circle');
    }
  }

  public function remove_member()
  {
    if (isset($_GET['circleID']) && isset($_GET['userID'])) {

      $model = new Circle();
      $circleID = $_GET['circleID'];
      $userID = $_GET['userID'];
      $result = $model->remove_circle_member($circleID, $userID);

      if ($result) {
        $_SESSION['message'] = user_name($userID) . ' removed!';
      } else {
        $_SESSION['message'] = 'Fail to remove ' . user_name($userID);
      }

      Redirect(URL . 'circle/' . $circleID);

    } else {
      Redirect(URL . 'circle');
    }
  }

  public function leave_circle()
  {
    if (isset($_GET['circleID']) && isset($_GET['userID'])) {

      $model = new Circle();
      $circleID = $_GET['circleID'];
      $userID = $_GET['userID'];
      $result = $model->remove_circle_member($circleID, $userID);

      if ($result) {
        $_SESSION['message'] = 'Left Circle ' . $circleID;
      } else {
        $_SESSION['message'] = 'Fail to leave Circle ' . $circleID;
      }

      Redirect(URL . 'circle');

    } else {
      Redirect(URL . 'circle');
    }
  }

  public function delete()
  {
    if (isset($_GET['circleID'])) {
        $circleID = $_GET['circleID'];

        $model = new Circle();
        $result = $model->delete($circleID, $this->current_userID);

        if ($result) {
          $_SESSION['message'] = 'Circle deleted!';
        } else {
          $_SESSION['message'] = 'Fail to delete circle!';
        }

        Redirect(URL . 'circle');

    } else {
      $_SESSION['message'] = 'No Circle ID';
      Redirect(URL . 'circle');
    }
  }

}

?>
