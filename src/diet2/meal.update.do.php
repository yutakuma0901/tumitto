<?php
//食事編集実行ページ
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";

$statement = $db->prepare('UPDATE diets SET meal=? WHERE id=?');
$statement->execute(array($_REQUEST['meal'], $_REQUEST['id']));

$title = "食事編集実行ページ";
$content = __DIR__ . "/views/meal.update.do.php";
include __DIR__ . "/views/layout.php";
