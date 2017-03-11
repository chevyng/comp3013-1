<?php

require_once APP . 'core/model.php';

class Blog extends Model
{

  public function find_user_blog($userID)
  {
    $sql = "SELECT *
            FROM blog
            WHERE userID = :userID
            ORDER BY CREATED_AT DESC";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    $query->execute($params);
    return $query->fetch();
  }

  public function create($userID, $name)
  {
    $sql = "INSERT INTO blog (userID, name)
            VALUES (:userID, :name)";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID,
                    ':name' => $name);
    return $query->execute($params); // boolean result
  }

  public function find_by_id($blogID)
  {
    $sql = "SELECT *
            FROM blog
            WHERE blogID = :blogID";

    $query = $this->db->prepare($sql);
    $params = array(':blogID' => $blogID);
    $query->execute($params);
    return $query->fetch();
  }

  public function search_blog_posts($blogID, $search_query)
  {
    $sql = "SELECT *
            FROM post
            WHERE blogID = :blogID
            AND (title LIKE :search_query
                OR body LIKE :search_query)
            ORDER BY UPDATED_AT DESC";

    $query = $this->db->prepare($sql);
    $params = array(':blogID' => $blogID,
                    ':search_query' => "%" . $search_query . "%");
    $query->execute($params);
    return $query->fetchAll();
  }

  public function find_blog_posts($blogID)
  {
    $sql = "SELECT *
            FROM post
            WHERE blogID = :blogID
            ORDER BY CREATED_AT DESC";

    $query = $this->db->prepare($sql);
    $params = array(':blogID' => $blogID);
    $query->execute($params);
    return $query->fetchAll();
  }

}

?>
