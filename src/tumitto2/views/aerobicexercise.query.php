<!-- ランニング詳細ページ（クエリパラメーター）-->
<h2>ランニング詳細ページ</h2>
<?php
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) {
  print('1以上の数字で入力してください');
  exit();
}

$diets = $db->prepare('SELECT aerobicexercise, id FROM diets WHERE id=?');
$diets->execute(array($id));
$diet = $diets->fetch();
?>
<article>
    <pre><?php print($diet['aerobicexercise']); ?>分</pre>
</article>


<a href="aerobicexercise.update.php?id=<?php print($diet['id']); ?>">編集する</a>
｜
<a href="delete.php?id=<?php print($diet['id']); ?>">この日のトレーニング全て削除する</a>
｜
<a href="aerobicexercise.php">戻る</a>
