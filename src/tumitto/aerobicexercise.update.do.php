<!-- ランニング編集実行ページ-->
<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";

$statement = $db->prepare('UPDATE diets SET aerobicexercise=? WHERE id=?');
$statement->execute(array($_POST['aerobicexercise'], $_POST['id']));


$title = "編集実行ページ";
$content = __DIR__ . "/views/aerobicexercise.update.do.php";
include __DIR__ . "/views/layout.php";
