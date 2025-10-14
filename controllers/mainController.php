<?php

//cargar modelo
require_once('models/User.php');
require_once('models/Topic.php');
require_once('models/Comment.php');
require_once('models/UserRepository.php');
require_once('models/TopicRepository.php');
require_once('models/CommentRepository.php');

session_start();
//consultas a la base de datos
$db = Connection::connect();

//inicializar sesión
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = false;
}


//mostrar vista
if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php');
} else {
    if (!($_SESSION['user'])) {
        require_once('controllers/userController.php');
    } else {
        require_once('controllers/topicController.php');
    }
}
