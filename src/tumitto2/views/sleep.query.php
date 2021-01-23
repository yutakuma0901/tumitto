<!-- 睡眠詳細ページ（クエリパラメーター）-->
<h2>睡眠詳細ページ</h2>
<?php
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) {
  print('1以上の数字で入力してください');
  exit();
}

$diets = $db->prepare('SELECT * FROM diets WHERE id=?');
$diets->execute(array($id));
$diet = $diets->fetch();
?>
<article>
  <pre><?php print($diet['sleep']); ?></pre>
</article>

<a href="sleep.update.php?id=<?php print $diet['id'] ?>">編集する</a>
｜
<a href="sleep.php">戻る</a>
