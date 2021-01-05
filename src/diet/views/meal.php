<h1>食事ページ</h1>

<section>
  <?php foreach ($diets as $diet) : ?>
    <h2><?php echo Escape($diet['create_at']) ?>&nbsp;&nbsp;||&nbsp;&nbsp;<?php echo Escape($diet['meal']) ?></h2>

  <?php endforeach; ?>
</section>
<p><a href="index.php">ダイエットホームへ</a></p>
