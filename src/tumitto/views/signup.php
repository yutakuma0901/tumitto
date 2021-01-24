<main>
  <div class="container" style="margin-top: 90px">
    <h3>「ツミット」の新規登録</h3>
    <h4>　ようこそ、「ツミット」へ。</h4>
    <div id="content">
      <br>
      <p>次のフォームに必要事項をご記入ください。</p>
      <form action="" method="post" enctype="multipart/form-data">
        <dl>
          <br>
          <dt>ニックネーム<span class="required">必須</span></dt>
          <dd>
            <input type="text" name="name" size="35" maxlength="255" placeholder="例）ゆうさん" value="<?php echo (escape($users['name'])); ?>" />
            <?php if (isset($errors['name'])) : ?>
              <div class="text-danger">
                <p class="error"><?= $errors['name'] ?></p>
              </div>
            <?php endif; ?>
          </dd>
          <dt>メールアドレス<span class="required">必須</span></dt>
          <dd>
            <input type="text" name="email" size="35" maxlength="255" placeholder="" value="<?php echo (escape($users['email'])); ?>" />
            <?php if (isset($errors['email'])) : ?>
              <div class="text-danger">
                <p class="error"><?= $errors['email'] ?></p>
              </div>
            <?php endif; ?>
          </dd>
          <dt>パスワード<span class="required">必須</span></dt>
          <dd>
            <input type="password" name="password" size="35" maxlength="20" placeholder="8文字以上で入力" value="<?php echo (escape($users['password'])); ?>" />
            <?php if (isset($errors['password'])) : ?>
              <div class="text-danger">
                <p class="error"><?= $errors['password'] ?></p>
              </div>
            <?php endif; ?>
          </dd>
          <dt>写真など</dt>
          <dd>
            <input type="file" name="image" size="35" value="test" />
            <?php if (isset($errors['image'])) : ?>
              <div class="text-danger">
                <p class="error"><?= $errors['image'] ?></p>
              </div>
            <?php endif; ?>
          </dd>
        </dl>
        <div><input type="submit" value="入力内容を確認する" /></div>
      </form>
    </div>
  </div>
</main>
