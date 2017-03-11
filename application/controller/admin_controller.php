<?php

require_once APP . 'model/admin.php';

class AdminController
{

  function __construct()
  {
    if (isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      $this->current_userID = $_SESSION['current_user']->userID;
      $model = new Admin();
      if ($model->is_admin($this->current_userID) == NULL) {
        $_SESSION['message'] = 'You do not have the administrative privilege';
        Redirect(URL);
      }
    }

  }

  public function index()
  {
    $model = new Admin();
    $users = $model->users();
    $profiles = $model->profiles();
    $posts = $model->posts();
    $circles = $model->circles();
    $members = $model->members();
    $messages = $model->messages();
    $collections = $model->collections();
    $photos = $model->photos();
    $comments = $model->comments();

    require APP . 'view/_templates/header.php';
    require APP . 'view/admin/index.php';
    require APP . 'view/_templates/footer.php';
  }

  public function delete_user()
  {
    if (isset($_GET['userID']) && strlen($_GET['userID'] > 0)) {
      $userID = $_GET['userID'];
      $model = new Admin();
      $result = $model->delete_user($userID);

      if ($result) {
        $_SESSION['message'] = 'User ' . $userID . ' deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete User ' . $userID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function update_user()
  {
    if (isset($_POST['update'])) {
      $userID = $_POST['userID'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];

      $model = new Admin();
      $result = $model->update_user($userID,
                                    $first_name,
                                    $last_name,
                                    $email);
      if ($result) {
        $_SESSION['message'] = 'User ' . $userID . ' updated';
      } else {
        $_SESSION['message'] = 'Fail to update User ' . $userID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function delete_profile()
  {
    if (isset($_GET['userID']) && strlen($_GET['userID'] > 0)) {
      $userID = $_GET['userID'];
      $model = new Admin();
      $result = $model->delete_profile($userID);

      if ($result) {
        $_SESSION['message'] = 'User ' . $userID . ' profile deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete User ' . $userID . ' profile';
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function update_profile()
  {
    if (isset($_POST['update'])) {

      $userID = $_POST['userID'];
      $about = $_POST['about'];
      $gender = $_POST['gender'];
      $birthdate = $_POST['birthdate'];
      $current_city = $_POST['current_city'];
      $home_city = $_POST['home_city'];
      $address = $_POST['address'];
      $languages = $_POST['languages'];
      $workplace = $_POST['workplace'];

      $model = new Admin();
      $result = $model->update_profile($userID,
                                       $about,
                                       $gender,
                                       $birthdate,
                                       $current_city,
                                       $home_city,
                                       $address,
                                       $languages,
                                       $workplace);
      if ($result) {
        $_SESSION['message'] = 'User ' . $userID . ' profile updated';
      } else {
        $_SESSION['message'] = 'Fail to update User ' . $userID . ' profile';
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function delete_post()
  {
    if (isset($_GET['postID']) && strlen($_GET['postID'] > 0)) {
      $postID = $_GET['postID'];
      $model = new Admin();
      $result = $model->delete_post($postID);

      if ($result) {
        $_SESSION['message'] = 'Post ' . $postID . ' deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete Post ' . $postID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function update_post()
  {
    if (isset($_POST['update'])) {
      $postID = $_POST['postID'];
      $title = $_POST['title'];
      $body = $_POST['body'];

      $model = new Admin();
      $result = $model->update_post($postID,
                                    $title,
                                    $body);
      if ($result) {
        $_SESSION['message'] = 'Post ' . $postID . ' updated';
      } else {
        $_SESSION['message'] = 'Fail to update Post ' . $postID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function delete_circle()
  {
    if (isset($_GET['circleID']) && strlen($_GET['circleID'] > 0)) {
      $circleID = $_GET['circleID'];
      $model = new Admin();
      $result = $model->delete_circle($circleID);

      if ($result) {
        $_SESSION['message'] = 'Circle ' . $circleID . ' deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete Circle ' . $circleID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function update_circle()
  {
    if (isset($_POST['update'])) {
      $circleID = $_POST['circleID'];
      $name = $_POST['name'];

      $model = new Admin();
      $result = $model->update_circle($circleID,
                                      $name);
      if ($result) {
        $_SESSION['message'] = 'Circle ' . $circleID . ' updated';
      } else {
        $_SESSION['message'] = 'Fail to update Circle ' . $circleID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function delete_member()
  {
    if (isset($_GET['cFriendsID']) && strlen($_GET['cFriendsID'] > 0)) {
      $cFriendsID = $_GET['cFriendsID'];
      $model = new Admin();
      $result = $model->delete_member($cFriendsID);

      if ($result) {
        $_SESSION['message'] = 'Member deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete member';
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function delete_message()
  {
    if (isset($_GET['messageID']) && strlen($_GET['messageID'] > 0)) {
      $messageID = $_GET['messageID'];
      $model = new Admin();
      $result = $model->delete_message($messageID);

      if ($result) {
        $_SESSION['message'] = 'Message ' . $messageID . ' deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete Message ' . $circleID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function update_message()
  {
    if (isset($_POST['update'])) {
      $messageID = $_POST['messageID'];
      $content = $_POST['content'];

      $model = new Admin();
      $result = $model->update_message($messageID,
                                      $content);
      if ($result) {
        $_SESSION['message'] = 'Message ' . $messageID . ' updated';
      } else {
        $_SESSION['message'] = 'Fail to update Message ' . $messageID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function delete_collection()
  {
    if (isset($_GET['collectionID']) && strlen($_GET['collectionID'] > 0)) {
      $collectionID = $_GET['collectionID'];
      $model = new Admin();
      $result = $model->delete_collection($collectionID);

      if ($result) {
        $_SESSION['message'] = 'Collection ' . $collectionID . ' deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete Collection ' . $collectionID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function update_collection()
  {
    if (isset($_POST['update'])) {
      $collectionID = $_POST['collectionID'];
      $accessRights = $_POST['accessRights'];

      $model = new Admin();
      $result = $model->update_collection($collectionID,
                                          $accessRights);
      if ($result) {
        $_SESSION['message'] = 'Collection ' . $collectionID . ' updated';
      } else {
        $_SESSION['message'] = 'Fail to update Collection ' . $collectionID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function delete_photo()
  {
    if (isset($_GET['photoID']) && strlen($_GET['photoID'] > 0)) {
      $photoID = $_GET['photoID'];
      $model = new Admin();

      $photo = $model->find_photo_by_id($photoID);
      if (!$photo) {
        $_SESSION['message'] = 'Photo ' . $photoID . ' does not exist';
        Redirect(URL . 'admin');
      }

      if (file_exists($photo->path)) {
        unlink($photo->path);
      }

      $result = $model->delete_photo($photoID);

      if ($result) {
        $_SESSION['message'] = 'Photo ' . $photoID . ' deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete Photo ' . $photoID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function delete_comment()
  {
    if (isset($_GET['commentID']) && strlen($_GET['commentID'] > 0)) {
      $commentID = $_GET['commentID'];
      $model = new Admin();
      $result = $model->delete_comment($commentID);

      if ($result) {
        $_SESSION['message'] = 'Comment ' . $commentID . ' deleted';
      } else {
        $_SESSION['message'] = 'Fail to delete Comment ' . $commentID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }

  public function update_comment()
  {
    if (isset($_POST['update'])) {
      $commentID = $_POST['commentID'];
      $content = $_POST['content'];

      $model = new Admin();
      $result = $model->update_comment($commentID,
                                       $content);
      if ($result) {
        $_SESSION['message'] = 'Comment ' . $commentID . ' updated';
      } else {
        $_SESSION['message'] = 'Fail to update Comment ' . $commentID;
      }
      Redirect(URL . 'admin');

    } else {
      Redirect(URL . 'admin');
    }
  }


}

?>
