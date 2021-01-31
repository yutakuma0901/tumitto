
<body>
  <div class="container">
    <h2>お問い合わせフォーム</h2>
    <?php if ($result) : ?>
      <h3>送信完了!</h3>
      <p>お問い合わせいただきありがとうございます。</p>
      <p>送信完了いたしました。</p>
    <?php else : ?>
      <p>申し訳ございませんが、送信に失敗しました。</p>
      <p>しばらくしてもう一度お試しになるか、メールにてご連絡ください。</p>
      <p>ご迷惑をおかけして誠に申し訳ございません。</p>
    <?php endif; ?>
  </div>
</body>

</html>
