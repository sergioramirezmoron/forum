<?php

//Logout
if (isset($_GET['logout'])) {
    $_SESSION['user'] = false;
    header('location:index.php');
}

//profile
if (isset($_GET['profile'])) {
    require_once('views/profileView.phtml');
    exit;
}

//Register
if (isset($_GET['register'])) {
    require_once('views/registerView.phtml');
    exit;
}

if (isset($_POST["registerSubmit"])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])) {
        $userCreated = UserRepository::register($_POST["username"], $_POST["password"], $_POST["password2"]);
        if ($userCreated) {
            require_once('views/loginView.phtml');
            header('Location: index.php?c=user');
            exit;
        }
    }
    require_once('views/registerView.phtml');
    exit;
}



//Login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION["user"] = UserRepository::login($_POST['username'], $_POST['password']);
    header('location:index.php');
}

//Default view
if (!$_SESSION['user']) {
    require_once('views/loginView.phtml');
    exit;
}
