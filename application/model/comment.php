<?php

require_once APP . 'core/model.php';

class Comment extends Model
{

  public function create($userID, $photoID, $comment)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO comment (userID, photoID, content, CREATED_AT)
            VALUES (:userID, :photoID, :content, '$timestamp')";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID,
                    ':photoID' => $photoID,
                    ':content' => $comment);
    return $query->execute($params); // boolean result
  }

}

?>
