<h2>ランニングページ</h2>

<article>
  <?php while ($diet = $diets->fetch()) : ?>
    <div>
      <img src="img/user_image/<?= escape($diet['image']); ?>" width="48" height="48" alt="" style="background-position: center center;border-radius: 100%;object-fit:cover;">
      <name style=""><?php print($diet['name']); ?></name>
      <p><a href="aerobicexercise.query.php?id=<?php print($diet['id']);?>" style="font-size: 20px;"><?php print($diet['aerobicexercise']) ; ?>分</a></p>
      <time><?php print($diet['create_at']) ?></time>
      <hr>
    </div>
  <?php endwhile; ?>
  <?php if ($page >= 2) : ?>
    <a href="aerobicexercise.php?page=<?php print($page - 1); ?>"><?php print($page - 1); ?>ページ目へ</a>
  <?php endif; ?>
  |
  <?php
  $counts = $db->query('SELECT COUNT(*) as cnt FROM diets');
  $count = $counts->fetch();
  $max_page = ceil($count['cnt'] / 5);
  if ($page < $max_page) :
  ?>
    <a href="aerobicexercise.php?page=<?php print($page + 1); ?>"><?php print($page + 1); ?>ページ目へ</a>
  <?php endif; ?>
</article>

<p><a href="index.php">ダイエットホームへ</a></p>
