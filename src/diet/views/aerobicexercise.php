<h2>ランニングページ</h2>

<article>
  <?php while ($diet = $diets->fetch()) : ?>
    <p><a href="diet.php?id=<?php print($diet['id']); ?>"><?php print(mb_substr($diet['aerobicexercise'], 0, 50)); ?></a></p>
    <time><?php print($diet['create_at']) ?></time>
    <hr>
  <?php endwhile; ?>
  <?php if($page >= 2):?>
    <a href="aerobicexercise.php?page=<?php print($page - 1); ?>"><?php print($page-1); ?>ページ目へ</a>
  <?php endif; ?>
  |
  <?php
    $counts = $db->query('SELECT COUNT(*) as cnt FROM diets');
    $count = $counts ->fetch();
    $max_page = ceil($count['cnt'] / 5);
    if($page < $max_page):
  ?>
    <a href="aerobicexercise.php?page=<?php print($page + 1); ?>"><?php print($page+1); ?>ページ目へ</a>
  <?php endif; ?>
</article>

<!-- 手続き型 -->
<!-- <section>
      <?php foreach ($diets as $diet) : ?>
        <h2><?php echo Escape($diet['create_at']) ?>&nbsp;&nbsp;||&nbsp;&nbsp;<?php echo Escape($diet['aerobicexercise']) ?>分</h2>
      <?php endforeach; ?>
    </section> -->
<p><a href="index.php">ダイエットホームへ</a></p>
