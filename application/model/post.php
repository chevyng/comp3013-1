<?php

require_once APP . 'core/model.php';

class Post extends Model
{

  public function posts_feed($userID)
  {
    $sql = "SELECT p.*, b.*, u.userID
            FROM post p
            JOIN blog b
                ON b.blogID = p.blogID
           	JOIN user u
                ON b.userID = u.userID
            WHERE u.userID IN (
                SELECT userID
                FROM relationship
                WHERE
                  STATUS = 0
                  AND userID_2 = :userID
                UNION
                SELECT userID_2
                FROM relationship
                WHERE
                  STATUS = 0
                  AND userID = :userID)
            ORDER BY p.UPDATED_AT DESC";

    $query = $this->db->prepare($sql);
    $params = array(':userID' => $userID);
    $query->execute($params);
    return $query->fetchAll();
  }

  public function search_post($userID, $search_query)
  {
    $sql = "SELECT p.*, u.userID
            FROM post p
            JOIN blog b
                ON b.blogID = p.blogID
           	JOIN user u
                ON b.userID = u.userID
            WHERE
              p.body LIKE :search_query
              OR p.title LIKE :search_query
              AND u.userID IN (
                SELECT userID
                FROM relationship
                WHERE
                  STATUS = 0
                  AND userID_2 = :userID
                UNION
                SELECT userID_2
                FROM relationship
                WHERE
                  STATUS = 0
                  AND userID = :userID)
            ORDER BY p.UPDATED_AT DESC";

    $query = $this->db->prepare($sql);
    $params = array(':search_query' => "%" . $search_query . "%",
                    ':userID' => $userID);
    $query->execute($params);
    return $query->fetchAll();
  }

  public function find_by_id($postID)
  {
    $sql = "SELECT *
            FROM post p
            JOIN blog b
              ON b.blogID = p.blogID
            WHERE p.postID = :postID";

    $query = $this->db->prepare($sql);
    $params = array(':postID' => $postID);
    $query->execute($params);
    return $query->fetch();
  }

  public function create($blogID, $title, $body)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO post (blogID, title, body, CREATED_AT)
            VALUES (:blogID, :title, :body, '$timestamp')";

    $query = $this->db->prepare($sql);
    $params = array(':blogID' => $blogID,
                    ':title' => $title,
                    ':body' => $body);
    return $query->execute($params); // boolean result
  }

  public function update($postID, $title, $body)
  {
    $timestamp = date("Y-m-d H:i:s");
    $sql = "UPDATE post
            SET title = :title,
                body = :body,
                UPDATED_AT = '$timestamp'
            WHERE postID = :postID";

    $query = $this->db->prepare($sql);
    $params = array(':title' => $title,
                    ':body' => $body,
                    ':postID' => $postID);
    return $query->execute($params); // boolean result
  }


  public function delete($postID)
  {
    $sql = "DELETE FROM post
            WHERE postID = :postID";

    $query = $this->db->prepare($sql);
    $params = array(':postID' => $postID);
    return $query->execute($params); // boolean result
  }

}

?>
