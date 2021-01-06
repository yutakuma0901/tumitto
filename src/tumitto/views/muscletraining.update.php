<!-- 筋トレ編集ページ-->
<h2>編集ページ</h2>
<form action="muscletraining.update.do.php" method="post">
  <input type="hidden" name='id' value="<?php print($id) ?>">
  <textarea name="muscletraining" cols="50" rows="10"><?php print($diet['muscletraining']) ?></textarea><br>
  <button type="submit">登録する</button>
  <a href="muscletraining.query.php?id=<?php print($diet['id']); ?>">戻る</a>
</form>
