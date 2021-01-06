<!-- 筋トレ詳細ページ（クエリパラメーター）-->
<h2>筋トレ詳細ページ</h2>
<?php
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) {
  print('1以上の数字で入力してください');
  exit();
}
$diets = $db->prepare('SELECT muscletraining, id FROM diets WHERE id=?');
$diets->execute(array($id));
$diet = $diets->fetch();
?>
<article>
  <pre><?php print($diet['muscletraining']); ?>セット</pre>
</article>

<a href="muscletraining.update.php?id=<?php print$diet['id']?>">編集する</a>
｜
<a href="muscletraining.php">戻る</a>
