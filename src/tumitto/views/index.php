<!-- ユーザーアカウント情報-->
<header>
  <div style='margin-top: 60px;'>
    <section class='card-deck  pb-4'>
      <div class='card border-0 d-flex  align-items-end justify-content-center'>
        <div class="card-body">
          <?php if ($user['image'] !== '') : ?>
            <img src="img/user_image/<?= escape($user['image']); ?>" alt="プロフィール画像" style="width: 100px; height:100px;background-position: center center;border-radius: 100%;object-fit:cover;">
          <?php else : ?>
            <img src="img/user_image/" alt="プロフィール画像" style="width: 100px; height:100px;background-position: center center;border-radius: 50%;object-fit:cover;">
          <?php endif; ?>
        </div>
      </div>
      <div class='card border-0 d-flex align-items-start text-nowrap' style="width: 8rem;">
        <p class='card-title h4'><?= escape($user['name']) ?>のダイエットルーム</p>
        <br>
        <p class="card-title h5"><?= escape($user['name']); ?>さん</p>
      </div>
    </section>
    <section>
      <div class="d-flex align-items-center justify-content-center mb-4" style="height: 60px; vertical-align: middle;">
        <div class="navbar-expand">
          <ul class="navbar-nav">
            <li class="nav-item">
              <p class="small">ユーザー登録数</p>
              <p>　　　<?= $getcountuser; ?></p>
            </li>
            <li class="nav-item ml-4">
              <p class="small">総積み上げ回数</p>
              <p>　　　<?= $getcountdiet; ?></p>
            </li>
            <li class="nav-item ml-4">
              <p class="small">あなたの積み上げ回数</p>
              <p>　　　<?= $getcountdietuser; ?></p>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <section>
      <div class="d-flex align-items-center justify-content-center bg-light mb-4" style="height: 60px; vertical-align: middle;">
        <div class="navbar-expand ">
          <ul class="navbar-nav">
            <li class="nav-item ml-1">
              <a href="" class="btn btn-info btn-sm text-white small"><i class="fas fa-pen"></i>積み上げ記録</a>
            </li>
            <li class="nav-item ml-1">
              <a href="" class="btn btn-secondary btn-sm text-white "><i class="fas fa-user-circle"></i>プロフィール</a>
            </li>
            <li class="nav-item ml-1">
              <a href="" class="btn btn-secondary btn-sm text-white "><i class="fas fa-clock"></i>タイムライン</a>
            </li>
            <li class="nav-item ml-1">
              <a href="" class="btn btn-secondary btn-sm text-white "><i class="fas fa-cog"></i>設定</a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>

  </div>
</header>


<main>
  <!-- スライダー -->
  <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src=" img/pexels-pixabay-40751.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src=" img/pexels-jonathan-borba-3076516.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/pexels-ella-olsson-1640777.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> -->


  <!-- 積み上げバー-->
  <!-- <div class="container py-4" id="skill">
    <h2>積み上げ状況</h2>
    <p>毎日の積み上げが未来のあなたを作ります</p>
    <div class="progress">
      <div class="progress-bar bg-dark" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">ランニング</div>
    </div>
    <div class="progress">
      <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">筋トレ</div>
    </div>
    <div class="progress">
      <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">食事</div>
    </div>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">睡眠</div>
    </div>
  </div> -->

  <!-- コンテンツ部分-->
  <div class="container ">
    <div style="text-align: center; margin: 20px 0;">
      <a href="new.php">
        <button type="button" class="btn btn-outline-secondary mb-3" style="width: 100%;">
          <h3>積み上げを追加</h3>
        </button>
      </a>
    </div>
    <div class="row row-cols-1 row-cols-md-2" id="works">
      <div class="col mb-4">
        <div class="card">
          <img src="img/pexels-pixabay-235922.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="aerobicexercise.php">
              <h5 class="card-title h4 text-dark mb-3">ランニング</h5>
            </a>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card">
          <img src="img/pexels-ketut-subiyanto-4473608.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="muscletraining.php">
              <h5 class="card-title h4 text-dark mb-3">筋トレ</h5>
            </a>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card">
          <img src="img/pexels-ella-olsson-1640774.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <a href=" meal.php">
              <h5 class="card-title h4 text-dark mb-3">食事</h5>
            </a>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card">
          <img src="img/pexels-ivan-oboleninov-935777.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="sleep.php">
              <h5 class="card-title h4 text-dark mb-3">睡眠</h5>
            </a>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<!-- 地図 -->
<section id="location" class="container" style="padding: 4% 0;">
  <div class="wrapper" style="display: flex; justify-content:space-between">
    <div class="location-info" style="width: 35%; margin-left: 20px;">
      <h3 class="sub-title">宮の沢JOYFIT</h3>
      <hr>
      <p style="padding: 12px 10px;">
        住所：札幌市西区<br>
        〇〇〇〇〇〇 000-22-1 <br>
        〇〇〇〇<br>
        電話：03-1111-1111 <br>
        営業時間：10:00~20:00 <br>
        休日：土日
      </p>
    </div>
    <!--location-info-->
    <div class="location-map" style="width: 74%;">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2913.6908281950537!2d141.27595941547955!3d43.0899948791447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0b286da5388a71%3A0x3151a356e6901b47!2zSk9ZRklUKOOCuOODp-OCpOODleOCo-ODg-ODiCkyNCDmnK3luYzlrq7jga7msqI!5e0!3m2!1sja!2sjp!4v1612081863297!5m2!1sja!2sjp" width="800" height="400" frameborder="0" style="border:0; width: 100%; margin-left: 20px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </div>
  <!--wrapper-->
</section>

<!-- SNS -->
<section id="sns" class="">
  <div class="wrapper container">
    <div class="sns-box">
      <h3 class="sub-title" style="">Facebook</h3>
      <hr>
      プラグイン
    </div>

    <div class="sns-box">
      <h3 class="sub-title">Twitter</h3>
      <hr>
      <a class="twitter-timeline" data-height="315" href="https://twitter.com/VbPgFtEz92ZqQ87?ref_src=twsrc%5Etfw">Tweets by VbPgFtEz92ZqQ87</a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>

    <div class="sns-box">
      <h3 class="sub-title">Youtube</h3>
      <hr>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/TRmI0YiIKPw?start=3" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
  <!--wrapper-->
</section>
