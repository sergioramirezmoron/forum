<?php
class CategoryRepository
{
    public static function createCategory($name, $description)
    {
        $db = Connection::connect();
        $query = "INSERT INTO categories VALUES (null, '$name', '$description')";
        if ($result = $db->query($query)) {
            return $db->insert_id;
        }
        return false;
    }

    public static function deleteCategory($id)
    {
        $db = Connection::connect();
        $q = "DELETE FROM categories WHERE id='" . $id . "'";
        if ($result = $db->query($q)) {
            return true;
        }
        return false;
    }

    public static function getCategoryById($id)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM categories WHERE id = " . $id;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new Category($row['id'], $row['name'], $row['description']);
        }
        return false;
    }

    public static function getCategories()
    {
        $db = Connection::connect();
        $q = "SELECT * FROM categories";
        $result = $db->query($q);
        $categories = array();
        while ($row = $result->fetch_assoc()) {
            $categories[] = new Category($row['id'], $row['name'], $row['description']);
        }
        return $categories;
    }
}
