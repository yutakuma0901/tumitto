<!-- 食事詳細ページ（クエリパラメーター）-->
<h2>食事詳細ページ</h2>
<?php
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) {
  print('1以上の数字で入力してください');
  exit();
}

$diets = $db->prepare('SELECT meal FROM diets WHERE id=?');
$diets->execute(array($id));
$diet = $diets->fetch();
?>
<article>
  <pre><?php print($diet['meal']); ?></pre>
</article>


<a href="meal.update.php?id=<?php print($id) ?>">編集する</a>
|
<a href="meal.php">戻る</a>
