<?php
//筋トレ編集実行ページ
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";


    $statement = $db->prepare('UPDATE diets SET muscletraining=? WHERE id=?');
    $statement->execute(array($_POST['muscletraining'],$_POST['id']));

$title = "編集実行ページ";
$content = __DIR__ . "/views/muscletraining.update.do.php";
include __DIR__ . "/views/layout.php";
