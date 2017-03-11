<?php

require_once APP . 'core/model.php';

class Photo extends Model
{
  public function find_user_photos($userID)
  {
    $sql = "SELECT *
            FROM photo
            WHERE userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    $query->execute($params);
    return $query->fetchAll();
  }


  public function find_by_id($photoID)
  {
    $sql = "SELECT *
            FROM photo
            WHERE photoID = :photoID";

    $query = $this->db->prepare($sql);
    $params = array(':photoID' => $photoID);
    $query->execute($params);
    return $query->fetch();
  }


  public function find_photo_comments($photoID)
  {
    $sql = "SELECT *
            FROM comment
            WHERE photoID = :photoID";

    $query = $this->db->prepare($sql);
    $params = array(':photoID' => $photoID);
    $query->execute($params);
    return $query->fetchAll();
  }


  public function create($userID, $collectionID,  $path)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO photo (userID, collectionID, path, CREATED_AT)
            VALUES (:userID, :collectionID, :path, '$timestamp')";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID,
                    ':collectionID' => $collectionID,
                    ':path' => $path);
    return $query->execute($params); // boolean result
  }

  public function get_annotations($photoID)
  {
    $sql = "SELECT *
            FROM annotation
            WHERE photoID = :photoID";

    $query = $this->db->prepare($sql);
    $params = array(':photoID' => $photoID);
    $query->execute($params);
    return $query->fetchAll();
  }

  public function set_annotation($photoID,$userID)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO annotation (photoID, userID, CREATED_AT)
            VALUES (:photoID, :userID, '$timestamp')" ;

    $query = $this->db->prepare($sql);
    $params = array(':photoID' => $photoID,
                    ':userID' => $userID);

    return $query->execute($params); // boolean result
  }

  public function delete_annotation($photoID,$userID)
  {
    $sql = "DELETE FROM annotation
            WHERE (photoID = :photoID AND userID = :userID)" ;

    $query = $this->db->prepare($sql);
    $params = array(':photoID' => $photoID,
                    ':userID' => $userID);

    return $query->execute($params); // boolean result
  }
}

?>
