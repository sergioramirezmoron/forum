<?php
class CommentRepository
{
    public static function createComment($content, $idAuthor, $idPost)
    {
        $db = Connection::connect();
        $query = "INSERT INTO comments VALUES (null, '$content', NOW(), '$idAuthor', '$idPost')";
        if ($result = $db->query($query)) {
            return $db->insert_id;
        }
        return false;
    }

    public static function deleteComment($id)
    {
        $db = Connection::connect();
        $q = "DELETE FROM comments WHERE id='" . $id . "'";
        if ($result = $db->query($q)) {
            return true;
        }
        return false;
    }

    public static function getCommentById($id)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM comments WHERE id = " . $id;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new Comment($row['id'], $row['content'], $row['date'], $row['id_author'], $row['id_post']);
        }
        return false;
    }

    public static function getCommentsByPostId($idPost)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM comments WHERE id_post = " . $idPost;
        $result = $db->query($q);
        $comments = array();
        while ($row = $result->fetch_assoc()) {
            $comments[] = new Comment($row['id'], $row['content'], $row['date'], $row['id_author'], $row['id_post']);
        }
        return $comments;
    }
}
