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

function saveDbPostData($db,$user,$replyid)
{
    $postid = $_POST['post_id'];
    $postimage = $user['image'];
    $postname = $user['name'];
    $message = $_POST['message'];
    $user = $_SESSION['login_id'];
    //$postuserid = $_POST['post_user_id'];
    // $replyid = $_REQUEST['id'];
    $replyid = $_REQUEST['id'];

    $sql = <<<EOT
INSERT INTO posts (
    post_id,
    post_image,
    post_name,
    message,
    post_user_id,
    reply_message_id,
    created
) VALUES(
    :post_id,
    :post_image,
    :post_name,
    :message,
    :post_user_id,
    :reply_message_id,
    NOW()
)
EOT;

    $posts = $db->prepare($sql);
    $params = array(':post_id' => $postid, ':post_image'=>$postimage, ':post_name'=>$postname, ':message' => $message, ':post_user_id' => $user, ':reply_message_id' => $replyid);
    $posts->execute($params);
    echo '登録が完了しました';
    return $user . $replyid;
}

function getCountDiets($db)
{
    $getcountdiets = $db->prepare('SELECT COUNT(d.id),d.*,u.* FROM diets d, users u WHERE d.user_id=u.login_id ');
    // $diets->bindParam(':login_user_id',(int)$user['id'], PDO::PARAM_INT);
    $getcountdiets->execute();
    $getcountdiet = $getcountdiets->fetch();

    return $getcountdiet;
}

function getCountUsers($db)
{
    $getcountusers = $db->prepare('SELECT COUNT(*) FROM  users ');
    // $diets->bindParam(':login_user_id',(int)$user['id'], PDO::PARAM_INT);
    $getcountusers->execute();
    $getcountuser = $getcountusers->fetch();
    return $getcountuser;
}
//}
function getCountDietsUser($db)
{
    $getcountdietsusers = $db->prepare('SELECT COUNT(d.id),d.*,u.* FROM diets d, users u WHERE d.user_id=u.login_id GROUP BY u.login_id ');
    // $diets->bindParam(':login_user_id',(int)$user['id'], PDO::PARAM_INT);
    $getcountdietsusers->execute();
    $getcountdietuser = $getcountdietsusers->fetch();

    return $getcountdietuser;
}
