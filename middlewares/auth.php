<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /');
}

$uri = explode('/', $_SERVER['REQUEST_URI']);

if ($uri[1] == 'admin' && $_SESSION['user_type'] == 'student') {
    header('Location: /student_view.php');
}

if ($uri[1] == 'student_view.php' && $_SESSION['user_type'] == 'teacher') {
    header('Location: /admin');
}