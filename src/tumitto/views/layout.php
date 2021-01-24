<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="stylesheets/css/app.css">
  <title><?php echo $title; ?></title>
</head>

<body class="">
  <!-- Optional JavaScript -->
  <!-- jQuery first, Popper.js, Bootstrap JSの順番に読み込む -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <!-- ナビゲーションメニュー -->
  <nav class="navbar navbar-expand-lg navbar-light bg-dark " style=" vertical-align: middle;">
    <a class=" navbar-brand text-light h1" href=" index.php">積み上げダイエットアプリ「ツミット」</a>
    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ">
        <a class="nav-link text-light" href="home.index.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-link text-light" href="#skill">Skill</a>
        <a class="nav-link text-light" href="#works">Works</a>
        <a class="nav-link text-light" href="#contact">Contact</a>
        <a class="nav-link text-light" href="https://keizoku-supporter.xyz/">blog</a>
      </div>
    </div>
  </nav>

  <!-- タイトル-->
  <!-- <header class='navbar  p-3 mb-5 text-dark'>

  </header> -->
  <div class="container">
    <?php include $content; ?>
  </div>
</body>
<footer class="text-center ">
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

    </div>
    <div class="container text-center mt-5 mb-5">
      <a class="" style="font-size:xx-small;">© 2020 Yuta Kawabata
      </a>
    </div>
  </div>
</footer>
