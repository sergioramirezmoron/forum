<?php

class User
{

    private $id;
    private $username;
    private $password;
    private $rol;
    private $avatar;


    public function __construct($id, $username, $password, $rol, $avatar = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
        $this->avatar = $avatar;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }
}
