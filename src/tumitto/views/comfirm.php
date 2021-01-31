<body>
  <div class="container">
    <h2>お問い合わせ確認画面</h2>
    <p>以下の内容でよろしければ「送信する」をクリックしてください。<br>
      内容を変更する場合は「戻る」をクリックして入力画面にお戻りください。</p>
    <div class="table-responsive confirm_table">
      <table class="table table-bordered">
        <caption>ご入力内容</caption>
        <tr>
          <th>お名前</th>
          <td><?php echo h($name); ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?php echo h($email); ?></td>
        </tr>
        <tr>
          <th>お電話番号</th>
          <td><?php echo h($tel); ?></td>
        </tr>
        <tr>
          <th>件名</th>
          <td><?php echo h($subject); ?></td>
        </tr>
        <tr>
          <th>お問い合わせ内容</th>
          <td><?php echo nl2br(h($body)); ?></td>
        </tr>
      </table>
    </div>
    <div class="container" style="display: flex;">
    <form action="contact.php" method="post" class="confirm item">
      <button type="submit" class="btn btn-secondary" style="margin-right: px;">戻る</button>
    </form>
    <form action="complete.php" method="post" class="confirm item">
      <!-- 完了ページへ渡すトークンの隠しフィールド -->
      <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>">
      <button type="submit" class="btn btn-success" >送信する</button>
    </form>
    </div>
  </div>
</body>

</html>
