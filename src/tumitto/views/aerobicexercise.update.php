<!--ランニング編集ページ-->
<!-- 情報の所得（id）-->
<h2>編集ページ</h2>
<form action="aerobicexercise.update.do.php" method="post">
    <input type="hidden" name='id' value="<?php print($id) ?>">
    <textarea name="aerobicexercise" cols="50" rows="10"><?php print($diet['aerobicexercise']) ?></textarea><br>
    <button type="submit">登録する</button>
    <a href="aerobicexercise.query.php?id=<?php print($diet['id']); ?>">戻る</a>
</form>
