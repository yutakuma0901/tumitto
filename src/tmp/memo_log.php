<?php

function CheckMemos($lists)
{
$errors = [];


  if (empty($lists['title'])) {
    $errors['title'] = '日付を入力して下さい';
} elseif (strlen($lists['title']) > 255) {
    $errors['title'] =  '日付は255文字以内で入力して下さい';
}
  if (empty($lists['plans'])) {
    $errors['plans'] = '予定名を入力して下さい';
} elseif (strlen($lists['plans']) > 100) {
    $errors['plans'] =  '予定名は255文字以内で入力して下さい';
}
  if (empty($lists['scheduled'])) {
    $errors['scheduled'] = '時間を入力して下さい';
} elseif (strlen($lists['scheduled']) > 100) {
    $errors['scheduled'] =  '時間は100文字以内で入力して下さい';
}
  if (empty($lists['place'])) {
    $errors['place'] = '場所を入力して下さい';
} elseif (strlen($lists['place']) > 100) {
    $errors['place'] =  '場所は100文字以内で入力して下さい';
}
  if (empty($lists['details'])) {
    $errors['details'] = '詳細な内容を入力して下さい' . PHP_EOL;
} elseif (strlen($lists['details']) > 1000) {
    $errors['details'] =  '詳細な内容は1000文字以内で入力して下さい' . PHP_EOL;
}

return $errors;

}

function CreateMysql()
{
$link = mysqli_connect("db", "book_log", "pass", "book_log");
if (!$link) {
    echo "データベースに接続できません" . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


return $link;
}


function CreateMemos($link)
{
  $lists = [];
  echo 'memoを追加します' . PHP_EOL;
  echo '日付：' ;
  $lists['title'] = trim(fgets(STDIN));

  echo '予定名：' ;
  $lists['plans'] = trim(fgets(STDIN));

  echo '時間：' ;
  $lists['scheduled'] = trim(fgets(STDIN));

  echo '場所：' ;
  $lists['place'] = trim(fgets(STDIN));

  echo '詳細な内容：';
  $lists['details'] = trim(fgets(STDIN));

$sql = <<<EOT
INSERT INTO memos (
    title,
    plans,
    scheduled,
    place,
    details
)VALUES (
    "{$lists['title']}",
    "{$lists['plans']}",
    "{$lists['scheduled']}",
    "{$lists['place']}",
    "{$lists['details']}"
)
EOT;

//バリデーションを行う

$validated = CheckMemos($lists);

if (count($validated) > 0) {
    foreach($validated as $error) {
      echo $error . PHP_EOL;
    }
    return;
}

    echo '登録が完了しました' . PHP_EOL . PHP_EOL;

    $result = mysqli_query($link,$sql);

if ($result){
    echo 'データの追加に成功しました' . PHP_EOL;
} else {
    echo 'データの追加に失敗しました' . PHP_EOL;
    echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
}


}

function ListMemos($link)
{
$sql = <<<EOT
SELECT
  title,
  plans,
  scheduled,
  place,
  details
FROM memos
EOT;
  if ($result = mysqli_query($link, $sql)) {
      while ($memos = mysqli_fetch_assoc($result)) {
          echo '日付：' . $memos['title'] . PHP_EOL;
          echo '予定名：' . $memos['plans'] . PHP_EOL;
          echo '時間：' . $memos['scheduled'] . PHP_EOL;
          echo '場所：' . $memos['place'] . PHP_EOL;
          echo '詳細な内容：' . $memos['details'] . PHP_EOL;
          echo '--------------' . PHP_EOL;
        }
  }
  mysqli_free_result($result);
}

$link = CreateMysql();

while (true) {
  echo '〜佑太MEMO〜' . PHP_EOL;
  echo '1,memoを追加する' . PHP_EOL;
  echo '7,memoを確認する' . PHP_EOL;
  echo '9,佑太MEMOを終了する' . PHP_EOL;
  echo '番号を選択して下さい（1,7,9） : ' ;

  $num = trim(fgets(STDIN));

  if ($num === '1') {
    $result = CreateMemos($link);
  }
  elseif ($num === '7') {
    ListMemos($link);
  }

  elseif ($num === '9') {
  mysqli_close($link);
      echo "データベースとの接続を解除しました";
  break;
}

}

?>
