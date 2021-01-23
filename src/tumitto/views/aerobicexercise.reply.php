<!-- ランニング返信ページ（クエリパラメーター）-->
<h2>返信ページ</h2>
<!-- 情報の所得（id）-->

<form action="aerobicexercise.reply.php?id=<?php print($diet['id']); ?>" method="post">
  <img src="img/user_image/<?= escape($user['image']); ?>" width="48" height="48" alt="" style="background-position: center center;border-radius: 100%;object-fit:cover;">
  <name style=""><?php print($user['name']); ?></name>
  <br>
  <textarea type="text" name="message" id="message" value="<?php echo $posts['message'] ?>" cols="50" rows="5"><?php print($diet['aerobicexercise']) ?></textarea>
  <input type="hidden" name="reply_post_id" value="<?php print(escape($_REQUEST['res'])); ?>"><br>
  <input type="submit"></input>
  <a href="aerobicexercise.query.php?id=<?php print($diet['id']); ?>">戻る</a>
</form>
