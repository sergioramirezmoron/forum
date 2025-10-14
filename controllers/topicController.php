<?php
include_once("helpers/FileHelper.php");

// Delete
if (isset($_GET["delete"])) {
    if (TopicRepository::deleteTopic($_GET["delete"])) {
        header("Location: index.php");
        exit();
    }
}

//Create
if (isset($_GET["create"])) {
    if (isset($_POST['title']) && isset($_POST['description'])) {
        $title = $_POST['title'];
        $content = $_POST['description'];
        $idAuthor = $_SESSION["user"]->getId();

        $newId = TopicRepository::createTopic($title, $content, $idAuthor);
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
