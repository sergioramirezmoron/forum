<?php
include_once("helpers/FileHelper.php");

// Delete
if (isset($_GET["delete"])) {
    $topicToDelete = TopicRepository::getTopicById($_GET["delete"]);
    if ($topicToDelete && (($_SESSION["user"]->getRol()) || ($topicToDelete->getIdAuthor()->getId() == $_SESSION["user"]->getId()))) {
        if (TopicRepository::deleteTopic($_GET["delete"])) {
            header("Location: index.php");
            exit();
        }
    }
}

//Create
if (isset($_GET["create"])) {
    if (isset($_POST['title']) && isset($_POST['description'])) {
        $title = $_POST['title'];
        $content = $_POST['description'];
        $idAuthor = $_SESSION["user"]->getId();
        $idCategory = isset($_POST['category']) ? $_POST['category'] : null;

        $newId = TopicRepository::createTopic($title, $content, $idAuthor, $idCategory);
        header("Location: index.php?c=topic&id=" . $newId);
        exit();
    }
    require_once 'views/createTopicView.phtml';
    exit();
}

// Show Topic
if (!isset($_GET['id'])) {
    $topics = TopicRepository::getTopics();
    require_once 'views/mainView.phtml';
} else {
    $topic = TopicRepository::getTopicById($_GET["id"]);
    $comments = $topic->getComments();
    require_once 'views/topicView.phtml';
}
