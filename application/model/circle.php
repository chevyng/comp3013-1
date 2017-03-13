<?php

require_once APP . 'core/model.php';

class Circle extends Model
{
  public function find_user_circle_admin($userID)
  {
    // Circles that User manage
    $sql = "SELECT *
            FROM circle
            WHERE userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    $query->execute($params);
    return $query->fetchAll();
  }

  public function find_user_circle_member($userID)
  {
    // Circles that User belong to but do not manage
    $sql = "SELECT c.*
            FROM circle as c, circleFriends as cf
            WHERE cf.userID = :userID
            AND cf.circleID = c.circleID
            AND c.circleID NOT IN (
              SELECT circleID
              FROM circle
              WHERE userID = :userID
            )";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    $query->execute($params);
    return $query->fetchAll();
  }

  public function find_circle_by_ID($circleID)
  {
    $sql = "SELECT *
            FROM circle
            WHERE circleID = :circleID";

    $query = $this->db->prepare($sql);
    $params = array(':circleID' => $circleID);
    $query->execute($params);
    return $query->fetch();
  }

  public function find_messages_by_circleID($circleID)
  {
    $sql = "SELECT *
            FROM message
            WHERE circleID = :circleID
            ORDER BY UPDATED_AT DESC";

    $query = $this->db->prepare($sql);
    $params = array(':circleID' => $circleID);
    $query->execute($params);
    return $query->fetchAll();
  }

  public function find_members_by_circleID($circleID){
    $sql = "SELECT *
            FROM circleFriends
            WHERE circleID = :circleID";

    // TODO: Join user and blog to get detailed information

    $query = $this->db->prepare($sql);
    $params = array(':circleID' => $circleID);
    $query->execute($params);
    return $query->fetchAll();
  }


  public function create($name, $userID)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO circle (userID, name, CREATED_AT)
            VALUES (:userID, :name, '$timestamp')";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID,
                    ':name' => $name);
    return $query->execute($params); // boolean result
  }

  public function delete($circleID, $userID)
  {
    $sql = "DELETE FROM circle
            WHERE circleID = :circleID
            AND userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':circleID' => $circleID,
                    ':userID' => $userID);
    return $query->execute($params); // boolean result
  }

  public function update_circle($name, $circleID, $userID)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "UPDATE circle
            SET name = :name,
                UPDATED_AT = '$timestamp'
            WHERE circleID = :circleID
            AND userID = :userID ";

    $query = $this->db->prepare($sql);
    $params = array(':name' => $name,
                    ':circleID' => $circleID,
                    ':userID' => $userID);
    return $query->execute($params); // boolean result
  }

  public function add_circle_member($circleID, $userID)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO circleFriends (circleID, userID, CREATED_AT)
            VALUES (:circleID, :userID, '$timestamp')";

    $query = $this->db->prepare($sql);
    $params = array(':circleID' => $circleID,
                    ':userID' => $userID);
    return $query->execute($params); // boolean result
  }

  public function remove_circle_member($circleID, $userID)
  {
    $sql = "DELETE FROM circleFriends
            WHERE circleID = :circleID
            AND userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':circleID' => $circleID,
                    ':userID' => $userID);
    return $query->execute($params); // boolean result
  }

  public function find_circleID_by_name($name){
    $sql = "SELECT *
            FROM circle
            WHERE name = :name";

    $query = $this->db->prepare($sql);
    $params = array(':name' => $name);
    $query->execute($params);
    return $query->fetch();
  }

}

?>
