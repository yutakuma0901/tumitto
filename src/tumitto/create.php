<?php
require __DIR__ . '/lib/mysqli.php';
//require __DIR__ . "/index.php";
session_start();
$user = getLoginUser($db);


//オブジェクト型mysql
function saveDbDietsData($db,$user)
{
    $user = $_SESSION['login_id'];
    // $user = $user['user_id'];
    $aerobicexercise = $_POST['aerobicexercise'];
    $muscletraining = $_POST['muscletraining'];
    $meal = $_POST['meal'];
    $sleep = $_POST['sleep'];

    $sql = <<<EOT
INSERT INTO diets (
    user_id,
    aerobicexercise,
    muscletraining,
    meal,
    sleep,
    create_at
) VALUES(
    :user_id,
    :aerobicexercise,
    :muscletraining,
    :meal,
    :sleep,
    NOW()
)
EOT;

    $stmt = $db->prepare($sql);
    $params = array(':user_id'=>$user, ':aerobicexercise'=>$aerobicexercise, ':muscletraining'=> $muscletraining, ':meal'=> $meal, ':sleep'=> $sleep);
    $stmt->execute($params);
    echo '登録が完了しました';
    return $user;
}

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
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $diets = [
        'aerobicexercise' => $_POST['aerobicexercise'],
        'muscletraining' => $_POST['muscletraining'],
        'meal' => $_POST['meal'],
        'sleep' => $_POST['sleep']
    ];
    //バリデーションを行う
    $errors = validation($diets);
    //成功した場合
    if (!count($errors))
    {
        //ユーザ情報をセッションする
        $user = getLoginUser($db);
        //ダイエットテーブルを作る。（）
        saveDbDietsData($db,$user);
        //ページをきょうせいてきに移動する
        header("Location: index.php");
    }
//エラーだった場合
}

$content = __DIR__ . "/views/new.php";
include __DIR__ . '/views/layout.php';
