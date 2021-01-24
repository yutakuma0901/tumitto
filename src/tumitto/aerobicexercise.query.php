<!-- ランニング詳細ページ（クエリパラメーター）-->
<?php
//ランニング詳細ページ
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
session_start();
$user = getLoginUser($db);

$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) {
    print('1以上の数字で入力してください');
    exit();
}

$diets = $db->prepare('SELECT d.create_at,d.aerobicexercise,d.id, u.* FROM diets d, users u WHERE d.user_id=u.login_id AND d.id=?');

$diets->execute(array($id));
$diet = $diets->fetch();

// if (isset($_REQUEST['id'])) {
//     $posts = $db->prepare('SELECT d.create_at,d.aerobicexercise,d.id, u.*,p.*FROM diets d, users u, posts p WHERE d.user_id=u.login_id AND p.reply_message_id=? ');
//     $posts->execute(array($_REQUEST['id']));
//     //$post = $posts->fetch();
//}
if (isset($_REQUEST['id'])) {
    $posts = $db->prepare('SELECT d.create_at,d.aerobicexercise,d.id, u.*,p.*FROM diets d, users u, posts p WHERE d.user_id=u.login_id AND p.reply_message_id=? GROUP BY p.post_id LIMIT 5');
    $posts->execute(array($_REQUEST['id']));
    //$post = $posts->fetch();
}




$title = "ランニング詳細ページ";
$content = __DIR__ . "/views/aerobicexercise.query.php";
include __DIR__ . "/views/layout.php";
