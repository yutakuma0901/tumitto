<?php
require __DIR__ . "/lib/escape.php";
require __DIR__ . "/lib/mysqli.php";


$errors = [];
$users = [
  'name' => '',
  'email' => '',
  'password' => '',
  'image' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $users = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'image' => $_POST['image']
  ];
  //バリデーションを行う
  $db = new Dbc;
  $errors = $dbc->createUserValidation($users);
  //成功した場合
  //アカウントの重複をチェック
  if (@!count($errors)) {
    session_start();
    $user = $dbc->prepare('SELECT COUNT(*) AS cnt FROM users WHERE email=?');
        $user->execute(array($users['email']));
        $record = $user->fetch();
        if ($record['cnt'] > 0) {
            $errors['email'] = '＊指定されたメールアドレスは、既に登録されています';
        }
    }
    if (!count($errors))
    {
        //選択した写真に日付を挿入し二重仕様を防ぐ
        $image = date('YmdHis') . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'img/user_image/' . $image);
        //セッションを使用して入力データを保存する
        $_SESSION['join'] = $_POST;
        $_SESSION['join']['image'] = $image;
        //ページをきょうせいてきに移動する
        header("Location: check.signup.php");
        exit();
    }
//エラーだった場合
}

if (@$_REQUEST['action'] == 'rewrite' && isset($_SESSION['join'])) {
    //ページを戻った際に情報を保持する
    $users = $_SESSION['join'];
}


$title = '新規登録画面';
$content = __DIR__ . '/views/signup.php';
include __DIR__ . '/views/home.layout.login.php';
