<?php

function Redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

function in_array_field($needle, $needle_field, $haystack, $strict = false) {
    if ($strict) {
        foreach ($haystack as $item)
            if (isset($item->$needle_field) && $item->$needle_field === $needle)
                return true;
    }
    else {
        foreach ($haystack as $item)
            if (isset($item->$needle_field) && $item->$needle_field == $needle)
                return true;
    }
    return false;
}

function user_name($userID) {

  require_once APP . 'model/user.php';
  $model = new User();
  $user = $model->find_by_id($userID);
  if ($user) {
    return $user->first_name . ' ' . $user->last_name;
  }
  return NULL;
}

function can_access_user($current_userID, $target_userID){
  require_once APP . 'model/user.php';
  require_once APP . 'model/friend.php';

  $model = new User();
  $target_user = $model->find_by_id($target_userID);

  $friendModel = new Friend();
    if ($target_user->privacy == 0) {
      $authorised_view_users = $friendModel->find_friends_of_friends($target_userID);
      $is_authorised = in_array_field($current_userID, 'userID', $authorised_view_users); 
      
      if ($is_authorised == false && $current_userID != $target_userID) {
        return false;
      }
    }
  return true;
}

?>
