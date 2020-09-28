<?php
$link = mysqli_connect('db','book_log','pass','book_log');

if(!$link) {
  echo 'データベースとの接続に失敗しました。' . PHP_EOL;
  echo 'debugging error' . mysqli_connect() . PHP_EOL;
  exit;
}

echo 'データベースに接続しました' . PHP_EOL;
mysqli_close($link);
echo 'データベースとの接続を解除しました' . PHP_EOL;
