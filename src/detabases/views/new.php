
    <h2 class="h3 text-dark mt-4 mb-4">読書ログの登録</h2>
    <form action="create.php" method="post">
      <?php if (count($errors)) : ?>
        <ul class="text-danger">
          <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <div class="form-group">
        <label for="title">書籍名</label>
        <input type="text" id="title" name="title" class="form-control" value="<?php echo $readings['title'] ?>">
      </div>
      <div class="form-group">
        <label for="creator">著者名</label>
        <input type="text" id="creator" name="creator" class="form-control" value="<?php echo $readings['creator'] ?>">
      </div>
      <div class="form-group">
        <label>読書状況</label>
        <div>
          <div class="form-check form-check-inline">
            <input type="radio" id="situation1" name="situation" class="form-check-input" value="未読" <?php echo ($readings['situation'] === '未読') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="situation1">未読</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" id="situation2" name="situation" class="form-check-input" value="読んでいる" <?php echo ($readings['situation'] === '読んでいる') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="situation2">読んでいる</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" id="situation3" name="situation" class="form-check-input" value="読了" <?php echo ($readings['situation'] === '読了') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="situation3">読了</label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="points">評価（5点満点の整数）</label>
        <input type="text" id="points" name="points" class="form-control" value="<?php echo $readings['points'] ?>">
      </div>
      <div class="form-group">
        <label for="impression">感想</label>
        <textarea type="text" id="impression" name="impression" class="form-control form-control-lg" rows='4' clos='10'><?php echo $readings['impression'] ?></textarea>
      </div>
      <button class="btn btn-primary" type="submit">登録する</button>
    </form>
