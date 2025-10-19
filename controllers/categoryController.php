<?php
//Create
if (isset($_GET["create"])) {
    if (isset($_POST['name']) && isset($_POST['description'])) {
        $name = $_POST['name'];
        $content = $_POST['description'];

        $newId = CategoryRepository::createCategory($name, $content);
        header("Location: index.php");
        exit();
    }
    require_once 'views/createCategoryView.phtml';
    exit();
}

// Show Topic
if (!isset($_GET['id'])) {
    $categories = CategoryRepository::getCategories();
    require_once 'views/mainView.phtml';
} else {
    $category = CategoryRepository::getCategoryById($_GET["id"]);
    require_once 'views/topicsView.phtml';
}
