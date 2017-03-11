<?php

require_once APP . 'core/model.php';

class Message extends Model
{

  public function create($userID, $circleID, $content)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO message (userID, circleID, content, CREATED_AT)
            VALUES (:userID, :circleID, :content, '$timestamp')";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID,
                     ':circleID' => $circleID,
                    ':content' => $content);
    return $query->execute($params); // boolean result
  }

}

?>
