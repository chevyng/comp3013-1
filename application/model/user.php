<?php

require_once APP . 'core/model.php';

class User extends Model
{
  public function get_all()
  {
    // TODO: limit field retrieved
    $sql = "SELECT *
            FROM user";

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  public function authenticate_user($email, $password)
  {
    $sql = "SELECT userID, first_name, last_name
            FROM user
            WHERE email = :email AND password = :password
            LIMIT 1";

    $query = $this->db->prepare($sql);
    $params = array(':email' => $email,
                    ':password' => $password);
    $query->execute($params);
    return $query->fetch();
  }

  public function find_by_id($userID)
  {
    $sql = "SELECT first_name, last_name, userID, email, password, privacy
            FROM user
            WHERE userID = :userID
            LIMIT 1";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    $query->execute($params);
    return $query->fetch();
  }

  public function find_by_email($email)
  {
    $sql = "SELECT *
            FROM user
            WHERE email = :email
            LIMIT 1";

    $query = $this->db->prepare($sql);
    $params = array(':email' => $email);
    $query->execute($params);
    return $query->fetch();
  }

  public function find_by_name($name)
  {
    $sql = "SELECT *
            FROM user
            WHERE
              first_name LIKE :name
              OR last_name LIKE :name
              OR CONCAT(first_name, ' ', last_name) LIKE :name";

    $query = $this->db->prepare($sql);
    $params = array(':name' => $name . '%');
    $query->execute($params);
    return $query->fetchAll();
  }

  public function is_friend($userID,$userID_2)
  {
    $sql = "SELECT status
            FROM relationship
            WHERE
              (userID = :userID AND userID_2 = :userID_2)
              OR (userID = :userID_2  AND userID_2 = :userID)";
    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID,
                    ':userID_2' => $userID_2);
    $query->execute($params);
    return $query->fetch();
  }


  public function create($first_name, $last_name, $email, $password)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO user (first_name, last_name, email, password, CREATED_AT)
            VALUES (:first_name, :last_name, :email, :password, '$timestamp')";

    $query = $this->db->prepare($sql);
    $params = array(':first_name' => $first_name,
                    ':last_name' => $last_name,
                    ':email' => $email,
                    ':password' => $password);
    return $query->execute($params); // boolean result
  }

  public function fetch_profile($userID)
  {
    $sql = "SELECT *
            FROM profile
            WHERE (userID = :userID)";
    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    $query->execute($params);
    return $query->fetch();
  }

  public function new_profile($userID, $about, $gender, $birthdate, $current_city,
                              $home_city, $address, $languages, $workplace)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO profile (userID, about, gender, birthdate, current_city,
                        home_city, address, languages, workplace, CREATED_AT)
            VALUES (:userID, :about, :gender, :birthdate, :current_city, :home_city,
                    :address, :languages, :workplace, '$timestamp')";

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

  public function update_user($first_name, $last_name, $email,
                                $password, $privacy, $userID)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "UPDATE user
            SET first_name = :first_name,
                last_name = :last_name,
                password = :password,
                email = :email,
                privacy = :privacy,
                UPDATED_AT = '$timestamp'
            WHERE userID = :userID";

    $query = $this->db->prepare($sql);
    $params = array(':first_name' => $first_name,
                    ':last_name' => $last_name,
                    ':email' => $email,
                    ':password' => $password,
                    ':privacy' => $privacy,
                    ':userID' => $userID,);
    return $query->execute($params); // boolean result
  }

}
?>
