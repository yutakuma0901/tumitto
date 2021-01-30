<!-- ランニング詳細ページ（クエリパラメーター）-->
<h2>ランニング詳細ページ</h2>
<?php

?>
<article>

  <img src="img/user_image/<?= escape($diet['image']); ?>" width="48" height="48" alt="" style="background-position: center center;border-radius: 100%;object-fit:cover;">
  <name style=""><?php print($diet['name']); ?></name>
  <p><a href="aerobicexercise.query.php?id=<?php print($diet['id']); ?>" style="font-size: 20px;"><?php print(mb_substr($diet['aerobicexercise'], 0, 50)); ?>分</a></p>
  <time><?php print($diet['create_at']) ?></time>
  <hr>

</article>

<a href="aerobicexercise.reply.php?id=<?php print($diet['id']); ?>">返信する</a>
｜
<a href="aerobicexercise.update.php?id=<?php print($diet['id']); ?>">編集する</a>
｜

<!-- Button trigger modal（削除ボタン） -->
<button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#deleteId<?= $diet['id'] ?>" title="削除する"><i class="fas fa-trash-alt"></i>削除</button>
<!-- Modal -->
<div class="modal fade" id="deleteId<?= $diet['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteIdLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteIdLabel">削除の確認</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        『<?= $diet['aerobicexercise'] ?>』を記録から削除してもよろしいですか？
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
        <form action="delete.php?id=<?php print($diet['id']) ?>" method="POST">
          <button type="submit" class="btn btn-danger">OK</button>
          <input type="hidden" name="diet_id" value="delete.php?id=<?php print($diet['id']) ?>">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- <a href="delete.php?id=<?php print($diet['id']); ?>">この日のトレーニング全て削除する</a> -->
｜
<a href="aerobicexercise.php">戻る</a>

<!-- 返信メッセージ -->
<article style="margin-left: 30px; margin-top: 20px;">
  <?php while ($post = $posts->fetch()) : ?>-->
  <img src="img/user_image/<?= escape($post['post_image']); ?>" width="48" height="48" alt="" style="background-position: center center;border-radius: 100%;object-fit:cover;">
  <name style="margin-left: 10px;"><?php print($post['post_name']); ?></name>
  <p style="font-size: 20px; margin: 10px 0 0 10px;"><?php print(mb_substr($post['message'], 0, 50)); ?></p>
  <time style="margin-left: 20px; color: darkgray;"><?php print($post['created']) ?></time>
  <hr>
<?php endwhile; ?>
</article>
