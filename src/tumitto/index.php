<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
$content = __DIR__ . "/views/index.php";
$title = 'ダイエットホームページ';

session_start();

$user = getLoginUser($db);
// if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
//     $_SESSION['time'] = time();

//     $users = $db->prepare('SELECT * FROM users WHERE id=?');
//     $users->execute(array($_SESSION['id']));
//     $user = $users->fetch();
// } else {
//     header('Location: login.php');
//     exit();
// }

include __DIR__ . "/views/layout.php";
