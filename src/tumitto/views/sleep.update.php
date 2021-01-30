<!--睡眠編集ページ-->
<!-- 情報の所得（id）-->
<form action="sleep.update.do.php" method="post">
  <input type="hidden" name="id" value="<?php print($id)?>">
  <textarea name="sleep" cols="50" rows="10"><?php print($diet['sleep']); ?></textarea><br>
  <button type="submit">編集する</button>
  |
  <a href="sleep.query.php?id=<?php print($id)?>">戻る</a>