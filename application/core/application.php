<?php

class Application
{
  private $url_controller = null;
  private $url_action = null;
  private $url_params = array();

  public function __construct()
  {

    session_start();

    $this->splitURL();

    if (isset($_SESSION['current_user'])){
      // for logged in user

      if (!$this->url_controller) {

        // load home page
        require_once APP . 'controller/home_controller.php';
        $page = new HomeController();
        $page->index();

      } elseif (file_exists(APP . 'controller/'. $this->url_controller . '_controller.php')) {

        $this->call_controller_action($this->url_controller, $this->url_action);

      } elseif ($this->user_exist($this->url_controller)) {

        $userID = $this->url_controller;
        $controller = $this->url_action;
        $action = $this->url_params;

        if (strlen($controller) == 0) {

          // Handle user profile e.g. /<userID>
          require APP . 'controller/user_controller.php';
          $page = new UserController();
          $page->profile($userID);

        } else {

          // Handle user profile e.g. /<userID>/collection
          require_once APP . 'controller/' . $controller . '_controller.php';
          $controller = ucfirst($controller) . 'Controller';
          $url_controller_obj = new $controller();
          $url_controller_obj->user_index($userID);

        }

      } else {

        // Route auth's action to AuthController
        require_once APP . 'controller/auth.php';
        $page = new AuthController();

        if ($this->url_controller == 'login') {

          $page->login();

        } elseif ($this->url_controller == 'logout') {

          $page->logout();

        } elseif ($this->url_controller == 'signup') {

          $page->signup();

        } else {
          echo $this->url_controller . ' user not found, and ';
          echo $this->url_controller . ' controller not found';
        }

      }

    } else {

      // Handle not logged in user

      require_once APP . 'controller/auth.php';
      $page = new AuthController();

      if ($this->url_controller == 'login' && (count($this->url_action) == 0)) {
        $page->login();
      } elseif ($this->url_controller == 'signup' && (count($this->url_action) == 0)) {
        $page->signup();
      } else {
        // Always redirect to login page unless going to 'login' or 'signup'
        if (isset($_SESSION['message'])) {
          $_SESSION['message'] = 'Please Log In';
        }
        Redirect(URL . 'login');
      }

    }

  }

  private function call_controller_action($controller_name, $action_or_id)
  {
    require_once APP . 'controller/' . $controller_name . '_controller.php';
    $controller = ucfirst($controller_name) . 'Controller';
    $url_controller_obj = new $controller();

    if (strlen($action_or_id) == 0) {

      if ($controller_name == 'admin') {
        $url_controller_obj->index();
      } else if ($controller_name == 'search') {
        $url_controller_obj->index();
      } else {
        Redirect(URL . $_SESSION['current_user']->userID . '/' . $controller_name);
      }

    } elseif (method_exists($url_controller_obj, $action_or_id)) {

      // action after controller
      $url_controller_obj->{$action_or_id}();

    } else {

      // id after controller
      $url_controller_obj->view($action_or_id);

    }
  }

  private function user_exist($userID)
  {
    require APP . 'model/user.php';
    $model = new User();
    $user = $model->find_by_id($userID);
    return ($user != NULL);
  }

  private function splitURL()
  {
    if (isset($_GET['url'])) {

      // split URL
      $url = trim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);

      $this->url_controller = isset($url[0]) ? $url[0] : null;
      $this->url_action = isset($url[1]) ? $url[1] : null;

      // remove controller and action
      unset($url[0], $url[1]);

      $this->url_params = array_values($url);
    }
  }
}
?>
