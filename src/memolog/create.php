<?php
require_once __DIR__ . '/lib/mysqli.php';


//バリデーションを行う
function Validated($lists)
{
  $errors = [];
  if (empty($lists['title'])) {
      $errors['title'] =  '日付を入力してください';
  } elseif (mb_strlen($lists['title']) > 255) {
        $errors['title'] = '日付は255文字以内で入力してください';
  }

  if (empty($lists['plans'])) {
      $errors['plans'] = '予定を入力してください';
  } elseif (mb_strlen($lists['plans']) > 100) {
        $errors['plans'] = '予定は100文字以内で入力してください';
  }

  if (empty($lists['scheduled'])) {
      $errors['scheduled'] = '時間を入力してください';
  } elseif (mb_strlen($lists['scheduled']) > 100) {
        $errors['scheduled'] = '時間は100文字以内で入力してください';
  }

  if (empty($lists['place'])) {
      $errors['place'] = '場所を入力してください';
  } elseif (mb_strlen($lists['place']) > 100) {
        $errors['place'] = '場所は100文字以内で入力してください';
  }

  if (empty($lists['details'])) {
      $errors['details'] = '詳細な内容を入力してください';
  } elseif (mb_strlen($lists['details']) > 1000) {
        $errors['details'] = '詳細な内容は1000文字以内で入力してください';
  }

  return $errors;
}

function CreateMemos($link,$lists)
{

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
    $result = mysqli_query($link, $sql);

    if (!$result) {
        error_log('Error; fail to create memos');
        error_log('Debugging Error:' . mysqli_error($link));
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
      $lists =
      [
        'title' => $_POST['title'],
        'plans' => $_POST['plans'],
        'scheduled' => $_POST['scheduled'],
        'place' => $_POST['place'],
        'details' => $_POST['details']
      ];
      //バリデーションを行う
      $errors = Validated($lists);

      if (!count($errors)) {
        $link = dbConnect();
        CreateMemos($link,$lists);
        mysqli_close($link);
        header("Location: index.php");
      }
}
$content = __DIR__ . '/views/new.php';
include __DIR__ . '/views/layout.php';
