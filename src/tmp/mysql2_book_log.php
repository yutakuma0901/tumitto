<?php

function validate($review)
{
    $errors = [];

    //書籍名が正しく入力されている
    if (!strlen($review['title'])) {
        $errors['title'] = '書籍名を入力して下さい';
    } elseif (strlen($review['title']) > 255) {
        $errors['title'] = '書籍名は255文字以内で入力して下さい';
    }

    //著者名が正しく入力されている
    if (!strlen($review['creator'])) {
        $errors['creator'] = '著者名を入力して下さい';
    } elseif (strlen($review['creator'] ) > 100) {
        $errors['creator'] = '著者名は100文字以内で入力して下さい';
    }

    //読書状況が正しく入力されている
    if (!in_array($review['situation'], ['未読', '読んでいる', '読了'], true)){
        $errors['situation'] = '（未読、読んでいる、読了）いずれかで入力して下さい';
    }

    //評価が正しく入力されている
    if ($review['points'] < 1 || $review['points'] > 5) {
        $errors['points'] = '評価は1~5の整数で入力してください';
    }

    //感想が正しく入力されている
    if (!strlen($review['impression'])) {
        $errors['impression'] = '感想を入力して下さい';
    } elseif (strlen($review['impression']) > 1000) {
        $errors['impression'] = '感想は1000文字以内で入力して下さい';
  }
    return $errors;
}

function createMysql()
{
    $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');
  if (!$link){
    echo 'データベースとの接続に失敗しました。' . PHP_EOL;
    echo 'debugging error' . mysqli_connect() . PHP_EOL;
  exit;
  }
  return $link;
}

function createReview($link)
{
    $review = [];

    echo '読書ログを登録してください。' . PHP_EOL;
    echo '書籍名：';
    $review['title'] = trim(fgets(STDIN));

    echo '著者名：';
    $review['creator'] = trim(fgets(STDIN));

    echo '読書状況（未読、読んでいる、読了）：';
    $review['situation'] = trim(fgets(STDIN));

    echo '評価（5点満点の整数）：';
    $review['points'] = (int) trim(fgets(STDIN));

    echo '感想：';
    $review['impression'] = trim(fgets(STDIN));

    $validated = validate($review);

    if (count($validated) > 0) {
      foreach ($validated as $error) {
            echo $error . PHP_EOL;
        }
        return;
    }

    $sql = <<<EOT
  INSERT INTO readings (
    title,
    creator,
    situation,
    points,
    impression
  ) VALUES (
    "{$review['title']}" ,
    "{$review['creator']}",
    "{$review['situation']}",
    "{$review['points']}",
    "{$review['impression']}"
  )
  EOT;

  $result = mysqli_query($link, $sql);
  if ($result) {
    echo '登録が完了しました' . PHP_EOL . PHP_EOL;
  } else {
    echo 'データの接続に失敗しました' . PHP_EOL;
    echo 'debugging error' . mysqli_error($link) . PHP_EOL;
  }
}

function indicateReview($link)
{
  echo '登録されている読書ログを表示します' . PHP_EOL;
  $sql = <<<EOT
  SELECT
    title,
    creator,
    situation,
    points,
    impression
  FROM readings
  EOT;

  $result = mysqli_query($link, $sql);
  while ($reading = mysqli_fetch_assoc($result)) {
    echo '書籍名：' . $reading['title'] . PHP_EOL;
    echo '著者名：' . $reading['creator'] . PHP_EOL;
    echo '読書状況（未読、読んでいる、読了）：' . $reading['situation'] . PHP_EOL;
    echo '評価（5点満点の整数）：' . $reading['points'] . PHP_EOL;
    echo '感想：' . $reading['impression'] . PHP_EOL . PHP_EOL;
  }
  mysqli_free_result($result);


}

$link = createMysql();

while (true) {
  echo '1,読書ログを登録' . PHP_EOL;
  echo '2.読書ログを表示' . PHP_EOL;
  echo '9.アプリケーションを終了' . PHP_EOL;
  echo '番号を選択して下さい（1,2,9）：';
  $num = trim(fgets(STDIN));

  if ($num === '1') {
    createReview($link);
  } elseif ($num === '9') {
    mysqli_close($link);
    break;
  } elseif ($num === '2') {
    indicateReview($link);
  };
}
