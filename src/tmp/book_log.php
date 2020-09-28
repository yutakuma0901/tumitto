<?php

function createReview() {
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

  $reviews = [];
while (true) {
    echo '1,読書ログを登録' . PHP_EOL;
    echo '2.読書ログを表示' . PHP_EOL;
    echo '9.アプリケーションを終了' . PHP_EOL;
    echo '番号を選択して下さい（1,2,9）：';
    $num = trim(fgets(STDIN));

    if ($num === '1') {
        $reviews[] = createReview();
    }
    elseif ($num === '9') {
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

?>
