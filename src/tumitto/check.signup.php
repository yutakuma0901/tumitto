<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
session_start();

if (!isset($_SESSION['join'])) {
    header('Location: signup.php');
    exit();
}

if(!empty($_POST)) {
    $statement = $db->prepare('INSERT INTO users SET name=?, email=?, password=?, image=?, created=NOW()');
    $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        sha1($_SESSION['join']['password']),
        $_SESSION['join']['image']
    ));
    unset($_SESSION['join']);

    header('Location: login.php');
    exit();
}



$title = '新規登録画面';
$content = __DIR__ . '/views/check.signup.php';
include __DIR__ . '/views/home.layout.login.php';
