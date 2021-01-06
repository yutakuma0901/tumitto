<h2>筋トレページ</h2>

<article>
  <?php while ($diet = $diets->fetch()) : ?>
    <p><a href="muscletraining.query.php?id=<?php print($diet['id']); ?>"><?php print(mb_substr($diet['muscletraining'], 0, 50)); ?>セット</a></p>
    <time><?php print($diet['create_at']) ?></time>
    <hr>
  <?php endwhile; ?>
  <?php if ($page >= 2) : ?>
    <a href="muscletraining.php?page=<?php print($page - 1); ?>"><?php print($page - 1); ?>ページ目へ</a>
  <?php endif; ?>
  |
  <?php
  $counts = $db->query('SELECT COUNT(*) as cnt FROM diets');
  $count = $counts->fetch();
  $max_page = ceil($count['cnt'] / 5);
  if ($page < $max_page) :
  ?>
    <a href="muscletraining.php?page=<?php print($page + 1); ?>"><?php print($page + 1); ?>ページ目へ</a>
  <?php endif; ?>
</article>



<p><a href="index.php">ダイエットホームへ</a></p>
