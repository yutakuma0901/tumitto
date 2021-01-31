<?php
//セッションを開始
session_start();
//エスケープ処理やデータチェックを行う関数のファイルの読み込み
require 'lib/functions.php';
//POSTされたデータをチェック
$_POST = checkInput($_POST);
//固定トークンを確認（CSRF対策）
if (isset($_POST['ticket'], $_SESSION['ticket'])) {
  $ticket = $_POST['ticket'];
  if ($ticket !== $_SESSION['ticket']) {
    //トークンが一致しない場合は処理を中止
    die('Access Denied!');
  }
} else {
  //トークンが存在しない場合は処理を中止（直接このページにアクセスするとエラーになる）
  die('Access Denied（直接このページにはアクセスできません）');
}
//POSTされたデータを変数に格納
$name = isset($_POST['name']) ? $_POST['name'] : NULL;
$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$email_check = isset($_POST['email_check']) ? $_POST['email_check'] : NULL;
$tel = isset($_POST['tel']) ? $_POST['tel'] : NULL;
$subject = isset($_POST['subject']) ? $_POST['subject'] : NULL;
$body = isset($_POST['body']) ? $_POST['body'] : NULL;
//POSTされたデータを整形（前後にあるホワイトスペースを削除）
$name = trim($name);
$email = trim($email);
$email_check = trim($email_check);
$tel = trim($tel);
$subject = trim($subject);
$body = trim($body);
//エラーメッセージを保存する配列の初期化
$error = array();
//値の検証（入力内容が条件を満たさない場合はエラーメッセージを配列 $error に設定）
if ($name == '') {
  $error['name'] = '*お名前は必須項目です。';
  //制御文字でないことと文字数をチェック
} else if (preg_match('/\A[[:^cntrl:]]{1,30}\z/u', $name) == 0) {
  $error['name'] = '*お名前は30文字以内でお願いします。';
}
if ($email == '') {
  $error['email'] = '*メールアドレスは必須です。';
} else { //メールアドレスを正規表現でチェック
  $pattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/uiD';
  if (!preg_match($pattern, $email)) {
    $error['email'] = '*メールアドレスの形式が正しくありません。';
  }
}
if ($email_check == '') {
  $error['email_check'] = '*確認用メールアドレスは必須です。';
} else { //メールアドレスを正規表現でチェック
  if ($email_check !== $email) {
    $error['email_check'] = '*メールアドレスが一致しません。';
  }
}
if (preg_match('/\A[[:^cntrl:]]{0,30}\z/u', $tel) == 0) {
  $error['tel'] = '*電話番号は30文字以内でお願いします。';
}
if ($tel != '' && preg_match('/\A\(?\d{2,5}\)?[-(\.\s]{0,2}\d{1,4}[-)\.\s]{0,2}\d{3,4}\z/u', $tel) == 0) {
  $error['tel_format'] = '*電話番号の形式が正しくありません。';
}
if ($subject == '') {
  $error['subject'] = '*件名は必須項目です。';
  //制御文字でないことと文字数をチェック
} else if (preg_match('/\A[[:^cntrl:]]{1,100}\z/u', $subject) == 0) {
  $error['subject'] = '*件名は100文字以内でお願いします。';
}
if ($body == '') {
  $error['body'] = '*内容は必須項目です。';
  //制御文字（タブ、復帰、改行を除く）でないことと文字数をチェック
} else if (preg_match('/\A[\r\n\t[:^cntrl:]]{1,1050}\z/u', $body) == 0) {
  $error['body'] = '*内容は1000文字以内でお願いします。';
}
//POSTされたデータとエラーの配列をセッション変数に保存
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['email_check'] = $email_check;
$_SESSION['tel'] = $tel;
$_SESSION['subject'] = $subject;
$_SESSION['body'] = $body;
$_SESSION['error'] = $error;
//チェックの結果にエラーがある場合は入力フォームに戻す
if (count($error) > 0) {
  //エラーがある場合
  $dirname = dirname($_SERVER['SCRIPT_NAME']);
  $dirname = $dirname == DIRECTORY_SEPARATOR ? '' : $dirname;
  $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['SERVER_NAME'] . $dirname . '/contact.php';
  header('HTTP/1.1 303 See Other');
  header('location: ' . $url);
  exit;
}



$title = "問合せ確認ページ";
$content = __DIR__ . "/views/comfirm.php";

include __DIR__ . "/views/layout.php";
