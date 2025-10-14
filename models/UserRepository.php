<?php
class UserRepository
{
    public static function register($username, $password, $password2)
    {
        $db = Connection::connect();
        if ($password === $password2) {
            $q = "INSERT INTO users (username, password, rol) VALUES ('" . $username . "', '" . md5($password) . "', 0)";
            $result = $db->query($q);
            if ($result) {
                return true;
            }
        }
        return false;
    }

    public static function login($username, $password)
    {
        $db = Connection::connect();
        $q = 'SELECT * FROM users WHERE username="' . $username . '" AND password="' . md5($password) . '"';
        $result = $db->query($q);

        if ($row = $result->fetch_assoc()) {
            return new User($row['id'], $row['username'], $row['password'], $row['rol']);
        } else {
            return false;
        }
    }

    public static function getUserById($id)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM users WHERE id=" . $id;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new User($row['id'], $row['username'], $row['password'], $row['rol']);
        } else {
            return false;
        }
    }
}
