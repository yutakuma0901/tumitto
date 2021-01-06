<body>
  <div class="container" style="margin-top: 90px">
    <br>
    <p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
    <form action="" method="post">
      <input type="hidden" name="action" value="submit" />
      <dl>
        <dt>ニックネーム</dt>
        <dd>
          <?php echo (escape($_SESSION['join']['name'])); ?>
        </dd>
        <dt>メールアドレス</dt>
        <dd>
          <?php echo (escape($_SESSION['join']['email'])); ?>
        </dd>
        <dt>パスワード</dt>
        <dd>
          【表示されません】
        </dd>
        <dt>写真など</dt>
        <dd>
          <?php if ($_SESSION['join']['image'] !== '') : ?>
            <img src="img/user_image/<?php echo (escape($_SESSION['join']['image'])); ?>">
          <?php endif; ?>
        </dd>
      </dl>
      <div><a href="signup.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
    </form>
  </div>


</body>

</html>
