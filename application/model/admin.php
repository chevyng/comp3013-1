<?php

require_once APP . 'core/model.php';

class Admin extends Model
{

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
            SET first_name = :first_name, last_name = :last_name, email = :email
            WHERE userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':first_name' => $first_name,
                    ':last_name' => $last_name,
                    ':email' => $email,
                    ':userID' => $userID);
    return $query->execute($params); // boolean result
  }

}

?>