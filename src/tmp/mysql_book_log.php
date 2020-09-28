<?php


function createMysql() {
  $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');
  if (!$link) {
    echo 'データベースとの接続に失敗しました。' . PHP_EOL;
    echo 'debugging error' . mysqli_connect() . PHP_EOL;
    exit;
  }
  echo 'データベースに接続しました' . PHP_EOL;
  return $link;

}

function createReview($link) {
  echo '読書ログを登録してください。' . PHP_EOL;
  echo '書籍名：';
  $title = trim(fgets(STDIN));

  echo '著者名：';
  $creator = trim(fgets(STDIN));

  echo '読書状況（未読、読んでいる、読了）：';
  $situation = trim(fgets(STDIN));

  echo '評価（5点満点の整数）：';
  $points = trim(fgets(STDIN));

  echo '感想：';
  $impression = trim(fgets(STDIN));

  echo '登録が完了しました' . PHP_EOL . PHP_EOL;

  return [
    'title' => $title,
    'creator' => $creator,
    'situation' => $situation,
    'points' => $points,
    'impression' => $impression,
  ];
  $sql = <<<EOT
  INSERT INTO readings (
    title,
    creator,
    situation,
    points,
    impression,
  )VALUES (
    'title',
    'creator',
    'situation',
    'points',
    'impression'
  )
  EOT;

  $result = mysqli_query($link,$sql);
  if ($result) {
    echo'データを追加しました' . PHP_EOL;
  }
  else {
    echo'データの接続に失敗しました' . PHP_EOL;
    echo 'debugging error' . mysqli_error($link) . PHP_EOL;
  }
}

function indicateReview($reviews) {

  echo '登録されている読書ログを表示します' . PHP_EOL;

  foreach ($reviews as $review) {
    echo '書籍名：' . $review['title'] . PHP_EOL;
    echo '著者名：' . $review['creator'] . PHP_EOL;
    echo '読書状況：' . $review['situation'] . PHP_EOL;
    echo '評価：' . $review['points'] . PHP_EOL;
    echo '感想：' . $review['impression'] . PHP_EOL;
    echo '--------------' . PHP_EOL;
  };
}
  $link = createMysql();
  $reviews = [];
while (true) {
    echo '1,読書ログを登録' . PHP_EOL;
    echo '2.読書ログを表示' . PHP_EOL;
    echo '9.アプリケーションを終了' . PHP_EOL;
    echo '番号を選択して下さい（1,2,9）：';
    $num = trim(fgets(STDIN));

    if ($num === '1') {
        $reviews[] = createReview($link);
    }
    elseif ($num === '9') {
      mysqli_close($link);
      break;
    }
    elseif (empty($reviews)) {
        echo '--------------' . PHP_EOL;
        echo 'まだ登録はありません' . PHP_EOL;
        echo '--------------' . PHP_EOL;
    }
    elseif ($num === '2') {
        indicateReview($reviews);
    };
}
