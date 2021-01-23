<!-- ランニング一覧ページ-->
<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
//require __DIR__ . "/index.php";
session_start();

//オブジェクト型mysql

// if(!empty($_POST)) {

// }

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
$user = getLoginUser($db);

$start = 5 * ($page - 1);
$diets = $db->prepare('SELECT d.create_at,d.aerobicexercise,d.id, u.* FROM diets d, users u WHERE d.user_id=u.login_id ORDER BY d.create_at DESC LIMIT ?, 5');
// $diets->bindParam(':login_user_id',(int)$user['id'], PDO::PARAM_INT);
$diets->bindParam(1, $start, PDO::PARAM_INT);
$diets->execute();





$title = "ランニングページ";
$content = __DIR__ . "/views/aerobicexercise.php";
include __DIR__ . "/views/layout.php";
