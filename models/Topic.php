<?php

class Topic
{

    private $id;
    private $title;
    private $description;
    private $date;
    private $idAuthor;
    private $idCategory;


    public function __construct($id, $title, $description, $date, $idAuthor, $idCategory)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->idAuthor = $idAuthor;
        $this->idCategory = $idCategory;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getIdAuthor()
    {
        return UserRepository::getUserById($this->idAuthor);
    }
    public function getIdCategory()
    {
        return $this->idCategory;
    }
    public function getComments()
    {
        return CommentRepository::getCommentsByPostId($_GET["id"]);
    }
}
