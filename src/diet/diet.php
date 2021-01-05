<?php
//トレーニング詳細ページ
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";


$diets = $db->query('SELECT * FROM diets ORDER BY id DESC');



$title = "ランニングページ";
$content = __DIR__ . "/views/diet.php";
include __DIR__ . "/views/layout.php";
