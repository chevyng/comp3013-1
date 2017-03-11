<?php

require_once APP . 'model/user.php';

class AuthController
{

  function __construct()
  {
    if (isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      $this->current_userID = $_SESSION['current_user']->userID;
    }
  }

  public function login()
  {
    if (isset($this->current_user)) {

      $_SESSION['message'] = 'Already logged in!';
      Redirect(URL);

    } elseif (isset($_POST["login"])) {

      $model = new User();
      $user = $model->authenticate_user($_POST["email"],
                                        $_POST["password"]);

      // TODO: HASH Password
      if ($user != NULL) {

        $_SESSION['current_user'] = $user;
        $_SESSION['message'] = 'Login successfully';
        Redirect(URL);

      } else {
        $_SESSION['message'] = 'Login failed';
        Redirect(URL . 'login');
      }

    } else {

      require APP . 'view/_templates/header.php';
      require APP . 'view/auth/form.php';
      require APP . 'view/_templates/footer.php';

    }

  }

  public function logout()
  {
    session_unset();
    $_SESSION['message'] = 'Logout successfully';
    Redirect(URL);
  }

  public function signup()
  {
    if (isset($this->current_user)) {

      $_SESSION['message'] = 'Already logged in!';
      Redirect(URL);

    } elseif (isset($_POST["signup"])) {

      $model = new User();

      // TODO: form validation

      if ($model->find_by_email($_POST["email"])) {

        $_SESSION['message'] = 'Email used';
        Redirect(URL . 'signup');

      } else {
        $result = $model->create($_POST["first_name"],
                                 $_POST["last_name"],
                                 $_POST["email"],
                                 $_POST["password"]);
        if ($result) {
          $_SESSION['message'] = 'Sign Up successfully';
          Redirect(URL . 'login');
        } else {
          $_SESSION['message'] = 'Sign Up failed';
          Redirect(URL . 'signup');
        }

      }

    } else {
      require APP . 'view/_templates/header.php';
      require APP . 'view/auth/signup.php';
      require APP . 'view/_templates/footer.php';
    }
  }

}

?>
