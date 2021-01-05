<form action="create.php" method="POST">

<h2 href="/memolog/index.php" class="h3 pb-3">メモの登録</h2>

  <?php if (count($errors)) : ?>
    <ul class="text-danger">
      <?php foreach ($errors as $error) : ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <main>
    <section>
      <div class="form-group">
        <label>日付</label>
        <input type="date" name="title" class="form-control" id="title" value="<?php echo $lists['title']; ?>">
      </div>
      <div class="form-group">
        <label>予定名</label>
        <input type="text" name="plans" class="form-control" id="plans" value="<?php echo $lists['plans']; ?>">
      </div>
      <div class="form-group">
        <label>時間</label>
        <input type="time" name="scheduled" class="form-control" id="scheduled" value="<?php echo $lists['scheduled']; ?>">
      </div>
      <div class="form-group">
        <label>場所</label>
        <input type="text" name="place" class="form-control" id="place" value="<?php echo $lists['place']; ?>">
      </div>
      <div class="form-group">
        <label>詳細な内容</label>
        <textarea type="text" name="details" class="form-control form-control-lg" rows='4' clos='10' id="details" value="<?php echo $lists['details']; ?>"></textarea>
      </div>
      <input type="submit" class="btn btn-primary" value="登録">
    </section>
  </main>
