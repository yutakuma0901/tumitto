<!-- ランニング編集ページ（id）-->
<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";

if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $diets = $db->prepare('SELECT * FROM diets WHERE id=? ');
    $diets->execute(array($id));
    $diet = $diets->fetch();
}

$title = "編集ページ";
$content = __DIR__ . "/views/aerobicexercise.update.php";
include __DIR__ . "/views/layout.php";
