<main>
  <div class="container" style="margin-top: 90px">
    <h2>「ツミット」へログイン</h2>
    <div id="content">
      <div>
        <p>　メールアドレスとパスワードを記入してログインしてください。</p>
      </div>
      <form action="" method="post">
        <?php if (isset($errors['blank'])) : ?>
          <div class="text-danger">
            <p class="error"><?= $errors['blank'] ?></p>
          </div>
        <?php endif; ?>
        <?php if (isset($errors['failed'])) : ?>
          <div class="text-danger">
            <p class="error"><?= $errors['failed'] ?></p>
          </div>
        <?php endif; ?>
        <dl>
          <dt>メールアドレス</dt>
          <dd class="">
            <input type="text" name="email" size="35" maxlength="255" value="<?php echo escape(($email)); ?>" />

          </dd>
          <dt>パスワード</dt>
          <dd>
            <input type="password" name="password" size="35" maxlength="255"  placeholder="10文字以上で入力" value="<?php echo escape((@$_POST['password'])); ?>" />
          </dd>
          <dt>ログイン情報の記録</dt>
          <dd>
            <input id="save" type="checkbox" name="save" value="on">
            <label for="save">次回からは自動的にログインする</label>
          </dd>
        </dl>
        <div>
          <input type="submit" value="ログインする" />
        </div>
        <br>
        <p>新規登録がまだの方はこちらからどうぞ。</p>
        <p>&raquo;<a href="signup.php">新規登録をする</a></p>
      </form>
    </div>

  </div>
</main>
