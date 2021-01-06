<?php
//食事詳細ページ
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";


$diets = $db->query('SELECT * FROM diets ORDER BY id DESC');



$title = "食事ページ";
$content = __DIR__ . "/views/meal.query.php";
include __DIR__ . "/views/layout.php";
