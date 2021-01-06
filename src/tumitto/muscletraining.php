<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";


//オブジェクト型mysql
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
  $page = $_REQUEST['page'];
} else {
  $page = 1;
}
$start = 5 * ($page - 1);
$diets = $db->prepare('SELECT create_at,muscletraining,id FROM diets ORDER BY id DESC LIMIT ?, 5');
$diets->bindParam(1, $start, PDO::PARAM_INT);
$diets->execute();


$title = "筋トレページ";
$content = __DIR__ . "/views/muscletraining.php";
include __DIR__ . "/views/layout.php";
