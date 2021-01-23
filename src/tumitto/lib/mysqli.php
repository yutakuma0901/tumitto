<?php
require __DIR__ . '/../../vendor/autoload.php';

// class Db
//{
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
        }
        return $db;
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


function getLoginUser($db)
{
    if (isset($_SESSION['login_id']) && $_SESSION['time'] + 3600 > time()) {
        $_SESSION['time'] = time();

        $users = $db->prepare('SELECT * FROM users WHERE login_id=?');
        $users->execute(array($_SESSION['login_id']));
        $user = $users->fetch();
    } else {
        header('Location: login.php');
        exit();
    }
    return $user;
}

function saveDbPostData($db,$user)
{
    $postid = $_POST['post_id'];
    $message = $_POST['message'];
    $user = $_SESSION['login_id'];
    //$postuserid = $_POST['post_user_id'];
    $replymessageid = $_POST['reply_message_id'];

    $sql = <<<EOT
INSERT INTO posts (
    post_id,
    message,
    post_user_id,
    reply_message_id,
    created
) VALUES(
    :post_id,
    :message,
    :post_user_id,
    :reply_message_id,
    NOW()
)
EOT;

    $posts = $db->prepare($sql);
    $params = array(':post_id' => $postid, ':message' => $message, ':post_user_id' => $user, ':reply_message_id' => $replymessageid);
    $posts->execute($params);
    echo '登録が完了しました';

    return $user;
}


//}
