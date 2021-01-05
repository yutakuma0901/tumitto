<form action="create.php" method="POST">


<a href="new.php" class="h2 btn btn-primary mb-4">メモを登録する</a>

  <main class="text-dark">
    <?php if (count($lists) > 0) : ?>
      <?php foreach ($lists as $list) : ?>
        <div class="card shadow-sm mb-4 text-dark">
          <section class="card-body">
            <h2 class=" h4 card-title">
              <?php echo escape($list['title']); ?>&nbsp;&nbsp;&nbsp;
              <?php echo escape($list['plans']); ?>
            </h2>
            <div class="card-subtitle">
              &nbsp;<?php echo escape($list['scheduled']); ?>&nbsp;&nbsp;|&nbsp;
              <?php echo escape($list['place']); ?>
            </div>
            <p class="pt-2">&nbsp;<?php echo escape($list['details']); ?></p>
          </section>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </main>
