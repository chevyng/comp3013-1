<?php

require_once APP . 'core/model.php';

class Admin extends Model
{

  public function is_admin($userID)
  {
    $sql = "SELECT userID
            FROM user
            WHERE userID = :userID AND admin = '1'
            LIMIT 1";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    $query->execute($params);
    return $query->fetch();
  }

  public function users()
  {
    // TODO: limit field retrieved
    $sql = "SELECT *
            FROM user";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_user($userID)
  {
    $sql = "DELETE FROM user
            WHERE userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    return $query->execute($params); // boolean result
  }

  public function update_user($userID, $first_name, $last_name, $email)
  {
    $sql = "UPDATE user
            SET first_name = :first_name,
                last_name = :last_name,
                email = :email
            WHERE userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':first_name' => $first_name,
                    ':last_name' => $last_name,
                    ':email' => $email,
                    ':userID' => $userID);
    return $query->execute($params); // boolean result
  }

  public function profiles()
  {
    // TODO: limit field retrieved
    $sql = "SELECT *
            FROM profile";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_profile($userID)
  {
    $sql = "DELETE FROM profile
            WHERE userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    return $query->execute($params); // boolean result
  }

  public function update_profile($userID, $about, $gender, $birthdate, $current_city,
                               $home_city, $address, $languages, $workplace)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "UPDATE profile
            SET about = :about,
                gender = :gender,
                birthdate = :birthdate,
                current_city = :current_city,
                home_city = :home_city,
                address = :address,
                languages = :languages,
                workplace = :workplace,
                UPDATED_AT = '$timestamp'
            WHERE (userID = :userID)";


    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID,
                    ':about' => $about,
                    ':gender' => $gender,
                    ':birthdate' => $birthdate,
                    ':current_city' => $current_city,
                    ':home_city' => $home_city,
                    ':address' => $address,
                    ':languages' => $languages,
                    ':workplace' => $workplace);
    return $query->execute($params); // boolean result
  }

  public function posts()
  {
    $sql = "SELECT *
            FROM post";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_post($postID)
  {
    $sql = "DELETE FROM post
            WHERE postID = :postID";

    $query = $this->db->prepare($sql);
    $params = array(':postID' => $postID);
    return $query->execute($params); // boolean result
  }

  public function update_post($postID, $title, $body)
  {
    $sql = "UPDATE post
            SET title = :title,
                body = :body
            WHERE postID = :postID";

    $query = $this->db->prepare($sql);
    $params = array(':title' => $title,
                    ':body' => $body,
                    ':postID' => $postID);
    return $query->execute($params); // boolean result
  }

  public function circles()
  {
    $sql = "SELECT *
            FROM circle";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_circle($circleID)
  {
    $sql = "DELETE FROM circle
            WHERE circleID = :circleID";

    $query = $this->db->prepare($sql);
    $params = array(':circleID' => $circleID);
    return $query->execute($params); // boolean result
  }

  public function update_circle($circleID, $name)
  {
    $sql = "UPDATE circle
            SET name = :name
            WHERE circleID = :circleID";

    $query = $this->db->prepare($sql);
    $params = array(':name' => $name,
                    ':circleID' => $circleID);
    return $query->execute($params); // boolean result
  }

  public function members()
  {
    $sql = "SELECT *
            FROM circleFriends";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_member($cFriendsID)
  {
    $sql = "DELETE FROM circleFriends
            WHERE cFriendsID = :cFriendsID";

    $query = $this->db->prepare($sql);
    $params = array(':cFriendsID' => $cFriendsID);
    return $query->execute($params); // boolean result
  }

  public function messages()
  {
    $sql = "SELECT *
            FROM message";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_message($messageID)
  {
    $sql = "DELETE FROM message
            WHERE messageID = :messageID";

    $query = $this->db->prepare($sql);
    $params = array(':messageID' => $messageID);
    return $query->execute($params); // boolean result
  }

  public function update_message($messageID, $content)
  {
    $sql = "UPDATE message
            SET content = :content
            WHERE messageID = :messageID";

    $query = $this->db->prepare($sql);
    $params = array(':content' => $content,
                    ':messageID' => $messageID);
    return $query->execute($params); // boolean result
  }

  public function collections()
  {
    $sql = "SELECT *
            FROM photoCollection";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_collection($collectionID)
  {
    $sql = "DELETE FROM photoCollection
            WHERE collectionID = :collectionID";

    $query = $this->db->prepare($sql);
    $params = array(':collectionID' => $collectionID);
    return $query->execute($params); // boolean result
  }

  public function update_collection($collectionID, $accessRights)
  {
    $sql = "UPDATE photoCollection
            SET accessRights = :accessRights
            WHERE collectionID = :collectionID";

    $query = $this->db->prepare($sql);
    $params = array(':accessRights' => $accessRights,
                    ':collectionID' => $collectionID);
    return $query->execute($params); // boolean result
  }


  public function photos()
  {
    $sql = "SELECT *
            FROM photo";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_photo($photoID)
  {
    $sql = "DELETE FROM photo
            WHERE photoID = :photoID";

    $query = $this->db->prepare($sql);
    $params = array(':photoID' => $photoID);
    return $query->execute($params); // boolean result
  }

  public function find_photo_by_id($photoID)
  {
    $sql = "SELECT *
            FROM photo
            WHERE photoID = :photoID";

    $query = $this->db->prepare($sql);
    $params = array(':photoID' => $photoID);
    $query->execute($params);
    return $query->fetch();
  }

  public function comments()
  {
    $sql = "SELECT *
            FROM comment";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function delete_comment($commentID)
  {
    $sql = "DELETE FROM comment
            WHERE commentID = :commentID";

    $query = $this->db->prepare($sql);
    $params = array(':commentID' => $commentID);
    return $query->execute($params); // boolean result
  }

  public function update_comment($commentID, $content)
  {
    $sql = "UPDATE comment
            SET content = :content
            WHERE commentID = :commentID";

    $query = $this->db->prepare($sql);
    $params = array(':content' => $content,
                    ':commentID' => $commentID);
    return $query->execute($params); // boolean result
  }

}

?>
