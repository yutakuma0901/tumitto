<!-- ランニング削除ページ-->
<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";

    if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $diets = $db->prepare('DELETE  FROM diets WHERE id=? ');
        $diets->execute(array($id));
    }


$title = "編集実行ページ";
$content = __DIR__ . "/views/delete.php";
include __DIR__ . "/views/layout.php";
