<?php
class TopicRepository
{
    public static function getTopicById($idPost)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM topics WHERE id=" . $idPost;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new Topic($row['id'], $row['title'], $row['description'], $row['date'], $row['id_author']);
        }
        return null;
    }

    public static function getTopics()
    {
        $db = Connection::connect();
        $q = "SELECT * FROM topics ORDER BY date DESC";
        $result = $db->query($q);
        $topics = array();
        while ($row = $result->fetch_assoc()) {
            $topics[] = new Topic($row['id'], $row['title'], $row['description'], $row['date'], $row['id_author']);
        }
        return $topics;
    }

    public static function createTopic($title, $description, $idAuthor)
    {
        $db = Connection::connect();
        $query = "INSERT INTO topics (title, description, date, id_author) VALUES ('$title', '$description', NOW(), '$idAuthor')";
        if ($result = $db->query($query)) {
            return $db->insert_id;
        }
        return false;
    }

    public static function deleteTopic($id)
    {
        $db = Connection::connect();
        $q = "DELETE FROM topics WHERE id=" . $id;
        if ($result = $db->query($q)) {
            return true;
        }
        return false;
    }
}
