<?php
require __DIR__ . '/../../vendor/autoload.php';

//手続き型mysql
// function dbConnect() {
//     $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
//     $dotenv->load();

//     $dbHost = $_ENV['DB_HOST'];
//     $dbUsername = $_ENV['DB_USERNAME'];
//     $dbPassword = $_ENV['DB_PASSWORD'];
//     $dbDatabase = $_ENV['DB_DATABASE'];

//     $link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
//     if (!$link) {
//         echo 'データベースとの接続に失敗しました。' . PHP_EOL;
//         echo 'debugging error' . mysqli_connect_error() . PHP_EOL;
//         exit;
//     }
//     return $link;
// }

//オブジェクト型mysql
//function dbConnect()
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
    $dotenv->load();
    $dbHost = $_ENV['DB_HOST'];
    $dbUsername = $_ENV['DB_USERNAME'];
    $dbPassword = $_ENV['DB_PASSWORD'];
    $dbDatabase = $_ENV['DB_DATABASE'];
    $dsn = 'mysql:dbname=' . $dbDatabase . ';host=' . $dbHost . '; charset=utf8';
    try {
            $db = new PDO($dsn, $dbUsername,$dbPassword);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo"接続失敗:" . $e->getMessage() . "\n";
            exit();
            return $db;
        }
    }
function createUserValidation($users)
{
    $errors = [];
    if (empty($users['name'])) {
        $errors['name'] = 'ニックネームを入力してください';
    }

    if (empty($users['email'])) {
        $errors['email'] = 'メールアドレスを入力してください';
    }

    if (empty($users['password'])) {
        $errors['password'] = 'パスワードを入力してください';
    } elseif (strlen(($users['password'])) < 8 ) {
        $errors['password'] = 'パスワードは8文字以内で入力してください';
    }

    $users['image'] = $_FILES['image']['name'];
    if (empty($users['image'])) {
        $ext = substr($users['image'], -3);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
            $errors['image'] = '写真などは「.jpg」または「.png」「.gif」の画像を選択して下さい';
        }
        // $error['image'] = '恐れ入りますが、画像を再度選択してください';
        return $errors;
    }

}
