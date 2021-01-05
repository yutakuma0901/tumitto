<!-- ランニング詳細ページ（クエリパラメーター）-->
<?php
//ランニング詳細ページ
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";


$diets = $db->query('SELECT * FROM diets ORDER BY id DESC');



$title = "ランニング詳細ページ";
$content = __DIR__ . "/views/aerobicexercise.query.php";
include __DIR__ . "/views/layout.php";
