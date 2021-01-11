<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheets/css/app.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <title><?= $title; ?></title>
</head>

<!-- Optional JavaScript -->
<!-- jQuery first, Popper.js, Bootstrap JSの順番に読み込む -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


<body>
  <nav class="navbar navbar-expand-md fixed-top shadow-sm bg-teal1 bg-dark" style="height: 60px; vertical-align: middle;">
    <div class="navbar-brand p-0">
      <a href="/"><img src="" alt="" height="45"></a>
    </div>
    <div class="row collapse navbar-collapse mr-auto">
      <a class="text-white text-decoration-none mb-0 h3" href="">積み上げダイエットアプリ 「ツミット」</a>
    </div>
    <div class="navbar-expand">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-sm bg-warning text-decoration-none text-white font-weight-bold ml-2 mr-2" href="signup.php" role="button">新規登録</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-sm btn-outline-teal1 bg-white text-decoration-none text-teal1 font-weight-bold ml-2 mr-2" href="login.php" role="button" disabled>　ログイン　</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php include $content; ?>
</body>
<footer>
  <div style="margin-top: 74px;">
    <div class="container text-center mt-5 mb-5" style="font-size:x-small;">
      <a class="btn btn-link">
        <h6>利用規約</h6>
      </a>
      <a class="btn btn-link">
        <h6>プライバシーポリシー</h6>
      </a>
      <a class="btn btn-link">
        <h6> 特定商取引に関する表記</h6>
      </a>
      <a class="btn btn-link">
        <h6> お問い合わせ</h6>
      </a>
    </div>
    <div class="container text-center mt-5 mb-5">
      <a class="" style="font-size:xx-small;">© 2020 Yuta Kawabata
      </a>
    </div>
  </div>
</footer>

</html>
