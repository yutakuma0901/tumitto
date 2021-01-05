<?php
require __DIR__ . '/lib/mysqli.php';

//手続き型mysql
// function createDiet($link, $diets)
// {
//     $sql = <<<EOT
// INSERT INTO diets (
//     aerobicexercise,
//     muscletraining,
//     meal,
//     sleep
// )VALUES (
//     "{$diets['aerobicexercise']}",
//     "{$diets['muscletraining']}",
//     "{$diets['meal']}",
//     "{$diets['sleep']}"
// )
// EOT;
//     $result = mysqli_query($link, $sql);
//     if (!$result) {
//         error_log('Error; fail to create reading');
//         error_log('Debugging Error; ' . mysqli_error($link));
//     };
// }

//オブジェクト型mysql

$sql = <<<EOT
INSERT INTO diets (
    id
    aerobicexercise,
    muscletraining,
    meal,
    sleep
)VALUES (
    "{$diets['id']}",
    "{$diets['aerobicexercise']}",
    "{$diets['muscletraining']}",
    "{$diets['meal']}",
    "{$diets['sleep']}"
)
EOT;




function Validation($diets)
{
    $errors = [];
    if (empty($diets['aerobicexercise'])) {
        $errors['aerobicexercise'] = 'ランニングを入力してください';
    } elseif (!is_numeric($diets['aerobicexercise'])) {
        $errors['aerobicexercise'] = '数字を入力してください';
    }

    if (empty($diets['muscletraining'])) {
        $errors['muscletraining'] = '筋トレを入力してください';
    } elseif (!is_numeric($diets['muscletraining'])) {
        $errors['muscletraining'] = '数字を入力してください';
    }

    if (empty($diets['meal'])) {
        $errors['meal'] = '食事を入力してください';
    } elseif (strlen(($diets['meal'])) > 1000) {
        $errors['meal'] = '食事は1000文字以内で入力してください';
    }

    if (empty($diets['sleep'])) {
        $errors['sleep'] = '睡眠を入力してください';
    } elseif (strlen(($diets['sleep'])) > 100) {
        $errors['sleep'] = '睡眠は100文字以内で入力してください';
    }

    return $errors;
}

//htmlで入力された情報をpostして受け取る。
    // if ($_SERVER['REQUEST_METHOD'] === 'POST')
    // {

    //     $diets = [
    //         'aerobicexercise' => $_POST['aerobicexercise'],
    //         'muscletraining' => $_POST['muscletraining'],
    //         'meal' => $_POST['meal'],
    //         'sleep' => $_POST['sleep']
    //     ];
    //   //バリデーションを行う
    //     $errors = validation($diets);
    //   //成功した場合
    //     if (!count($errors))
    //     {
    //         //データベースに接続
    //         $link = dbConnect();
    //         //ダイエットテーブルを作る。（）
    //         createDiet($link,$diets);
    //         //ページをきょうせいてきに移動する
    //         header("Location: index.php");
    //     }
    // //エラーだった場合
    // }

//htmlで入力された情報をpostして受け取る。
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $diets = [
        'aerobicexercise' => $_POST['aerobicexercise'],
        'muscletraining' => $_POST['muscletraining'],
        'meal' => $_POST['meal'],
        'sleep' => $_POST['sleep']
    ];
    //バリデーションを行う
    $errors = validation($diets);
    //成功した場合
    if (!count($errors)) {
        //データベースに接続
        //$link = dbConnect();
        //ダイエットテーブルを作る。（）
        $count = $db->exec($sql);
        //ページをきょうせいてきに移動する
        header("Location: index.php");
    }
    //エラーだった場合
}

$content = __DIR__ . "/views/new.php";
include __DIR__ . '/views/layout.php';
