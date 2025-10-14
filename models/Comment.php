<?php

class Comment
{

    private $id;
    private $content;
    private $date;
    private $idAuthor;
    private $idTopic;

    public function __construct($id, $content, $date, $idAuthor, $idTopic)
    {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->idAuthor = $idAuthor;
        $this->idTopic = $idTopic;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getIdAuthor()
    {
        return UserRepository::getUserById($this->idAuthor);
    }
    public function getIdTopic()
    {
        return $this->idTopic;
    }
}
