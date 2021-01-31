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


<!-- 問合せフォーム -->
