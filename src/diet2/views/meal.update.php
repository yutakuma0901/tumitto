<!--食事編集ページ-->
<!-- 情報の所得（id）-->
<form action="meal.update.do.php" method="post">
    <input type="hidden" name="id" value="<?php print($id)?>">
    <textarea name="meal" cols="50" rows="10"><?php print($diet['meal']); ?></textarea><br>
    <button type="submit">編集する</button>
    |
    <a href="meal.query.php?id=<?php print($id)?>">戻る</a>
