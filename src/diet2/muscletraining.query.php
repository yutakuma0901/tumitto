<?php
//筋トレ詳細ページ
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";


$diets = $db->query('SELECT * FROM diets ORDER BY id DESC');



$title = "筋トレ詳細ページ";
$content = __DIR__ . "/views/muscletraining.query.php";
include __DIR__ . "/views/layout.php";
