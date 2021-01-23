<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
$content = __DIR__ . "/views/index.php";
$title = 'ダイエットホームページ';

session_start();

if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
    $db = new Dbc;
    $login_user = $db->getLoginUser();
    $_SESSION = $login_user;
    $_SESSION['time'] = time();
//     $users = $dbc->prepare('SELECT * FROM users WHERE id=?');
//     $users->execute(array($_SESSION['id']));
//     $user = $users->fetch();
} else {
    header('Location: login.php');
    exit();
}
include __DIR__ . "/views/layout.php";
