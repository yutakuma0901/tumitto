<!-- ランニング返信ページ（id）-->
<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";

session_start();
$user = getLoginUser($db);


if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $diets = $db->prepare('SELECT * FROM diets WHERE id=? ');
    $diets->execute(array($id));
    $diet = $diets->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $posts = [
    'post_id' => $_POST['post_id'],
    'message' => $_POST['message'],
    //'post_user_id' => $_POST['post_user_id'],
    'reply_message_id' => $_POST['reply_message_id']
  ];
  //バリデーションを行う
  //$errors = validation($diets);
  //成功した場合
  // if (!count($errors)) {

  // }
  //ダイエットテーブルを作る。（）
  saveDbPostData($db,$user,$replyid);

  //aerobicexercise.query.php?id=<?php print($diet['id']);
  header(sprintf("Location: aerobicexercise.query.php?id=%s", urlencode($diet['id'])));
  //エラーだった場合
}

// $post = saveDbPostData($db);



$title = "返信ページ";
$content = __DIR__ . "/views/aerobicexercise.reply.php";
include __DIR__ . "/views/layout.php";
