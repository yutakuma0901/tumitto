<?php
session_start();
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";

if (@$_COOKIE['email'] !== '') {
    $email = $_COOKIE['email'];
}

if(!empty($_POST)) {
    $db = new Dbc;
    $login = $db->validationUserSignup($user);
    // $email = $_POST['email'];

    // if($_POST['email'] !== '' && $_POST['password'] !== '') {
    //     $login = $db->prepare('SELECT * FROM users WHERE email=? AND password=?');
    //     $login->execute(array($_POST['email'], sha1($_POST['password'])));
    //     $user = $login->fetch();
    //     if($user) {
    //         $_SESSION['id'] = $user['id'];
    //         $_SESSION['time'] = time();

    //         if ($_POST['save'] === 'on') {
    //             setcookie('email', $_POST['email'], time()+60*60*24*14);
    //         }

    //         header('Location: index.php');
    //         exit();
    //     } else {
    //         $errors['failed'] = '＊ログインに失敗しました';
    //     }
    // } else {
    //     $errors['blank'] = '＊メールアドレスとパスワードを入力してください';
    // }
}
// if(!empty($users)) {
//     if($users['email'] !== '' && $users['password'] !== '') {
//         $login = $db->prepare('SELECT * FROM users WHERE email=? AND password=?');
//         $login->execute(array($users['email'], sha1($users['password'])));
//         $user = $login->fetch();
//         if($user) {
//             $_SESSION['id'] = $user['id'];
//             $_SESSION['time'] = time();

//             header('Location: index.php');
//             exit();
//         } else {
//             $errors['login'] = '＊ログインに失敗しました';
//         }
//     } else {
//         $errors['login'] = '＊メールアドレスとパスワードを入力してください';
//     }
// }




$title = 'ログイン画面';
$content = __DIR__ . '/views/login.php';
include __DIR__ . '/views/home.layout.login.php';
