<?php
require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysql.php';

function createReadings($link, $readings)
{
    $sql = <<<EOT
INSERT INTO readings (
    title,
    creator,
    situation,
    points,
    impression
)VALUES (
    "{$readings['title']}" ,
    "{$readings['creator']}" ,
    "{$readings['situation']}" ,
    "{$readings['points']}" ,
    "{$readings['impression']}"
)
EOT;
    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('Error; fail to create reading');
        error_log('Debugging Error; ' . mysqli_error($link));
    };
};

function validate($readings)
{
    $errors = [];
    //作品名
    if (!strlen($readings['title'])) {
        $errors['title'] = '作品名を入力して下さい';
    } elseif (strlen($readings['title']) > 255) {
        $errors['title'] = '作品名は255文字以内で入力して下さい';
    }

    //著者名
    if (!strlen($readings['creator'])) {
        $errors['creator'] = '著者名を入力して下さい';
    } elseif (strlen($readings['creator'] > 100)) {
        $errors['creator'] = '著者名は100文字以内で入力して下さい';
    }

    //読書状況
    if (!in_array($readings['situation'], ['未読', '読んでいる', '読了'])) {
        $errors['situation'] = '読書状況を選択して下さい';
    }

    //評価
    if (!strlen($readings['points'])) {
        $errors['points'] = '評価を入力してください';
    } elseif ($readings['points'] < 1 || $readings['points'] > 5) {
        $errors['points'] = '評価は1〜5の整数で入力してください';
    }

    //感想
    if (!strlen($readings['impression'])) {
        $errors['impression'] = '感想を入力してください';
    } elseif (strlen($readings['impression']) > 1000) {
        $errors['impression'] = '感想は1000文字以内で入力してください';
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $situation = '';
    if (array_key_exists('situation', $_POST)) {
        $situation = $_POST['situation'];
    }
    $readings = [
        'title' => $_POST['title'],
        'creator' => $_POST['creator'],
        'situation' => $situation,
        'points' => $_POST['points'],
        'impression' => $_POST['impression']
    ];
    ///バリデーションを行う
    $errors = validate($readings);
    //バリデーションがうまく行った場合
    if (!count($errors))
    {

        $link = dbConnect();
        createReadings($link, $readings);
        mysqli_close($link);
        header("Location: index.php");
    }
    //バリデーションがうまくいかなかった場合
}

$content = __DIR__ . '/views/new.php';
include __DIR__ . '/views/layout.php';
