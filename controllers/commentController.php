<?php

//Delete
if (isset($_GET["delete"]) && $_SESSION["user"]->getRol()) {
    if (CommentRepository::deleteComment($_GET["delete"])) {
        header("Location: index.php?c=topic&id=" . $_GET["post_id"]);
        exit();
    }
}

//Create
if (isset($_POST["content"])) {
    $content = $_POST["content"];
    $id_author = $_SESSION["user"]->getId();
    $id_post = $_GET["id"];
    if (CommentRepository::createComment($content, $id_author, $id_post)) {
        header("Location: index.php?c=topic&id=" . $id_post);
        exit();
    }
}
require_once 'views/mainView.phtml';
exit();
