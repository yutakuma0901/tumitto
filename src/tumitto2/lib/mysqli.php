<?php
require __DIR__ . '/../../vendor/autoload.php';

class Dbc {
//オブジェクト型mysql
    protected function dbConnect()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();
        $dbHost = $_ENV['DB_HOST'];
        $dbUsername = $_ENV['DB_USERNAME'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        $dbDatabase = $_ENV['DB_DATABASE'];
        $dsn = 'mysql:dbname=' . $dbDatabase . ';host=' . $dbHost . '; charset=utf8';
        try {
                $db = new PDO($dsn, $dbUsername,$dbPassword,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]);
            } catch(PDOException $e) {
                echo"接続失敗:" . $e->getMessage() . "\n";
                exit();
            }
            return $db;
        }

    public function saveDbPostData()
    {
        $aerobicexercise = $_POST['aerobicexercise'];
        $muscletraining = $_POST['muscletraining'];
        $meal = $_POST['meal'];
        $sleep = $_POST['sleep'];

        $sql = <<<EOT
        INSERT INTO diets (
            aerobicexercise,
            muscletraining,
            meal,
            sleep
        )VALUES (
            :aerobicexercise,
            :muscletraining,
            :meal,
            :sleep
        )
        EOT;

        $db = $this->dbConnect();
        $stmt = $db->prepare($sql);
        $params = array(':aerobicexercise' => $aerobicexercise, ':muscletraining' => $muscletraining, ':meal' => $meal, ':sleep' => $sleep);
        $stmt->execute($params);
        echo '登録が完了しました';
    }

    public function getLoginUser()
    {
        // if (empty($user)) {
        //     exit('ユーザー情報が不正です');
        // }
        $db = $this->dbConnect();
        $users = $db->prepare('SELECT * FROM users WHERE id=?');
        $users->execute(array($_SESSION['id']));
        $user = $users->fetch();
        if (!$user) {
            exit('ユーザー情報が取得できません');
        }
        return $user;
    }

    public function validationUserSignup($user)
    {
        $email = $_POST['email'];
        $db = $this->dbConnect();
        if ($_POST['email'] !== '' && $_POST['password'] !== '') {
            $login = $db->prepare('SELECT * FROM users WHERE email=? AND password=?');
            $login->execute(array($_POST['email'], sha1($_POST['password'])));
            $user = $login->fetch();
            if ($user) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['time'] = time();

                if ($_POST['save'] === 'on') {
                    setcookie('email', $_POST['email'], time() + 60 * 60 * 24 * 14);
                }

                header('Location: index.php');
                exit();
            } else {
                $errors['failed'] = '＊ログインに失敗しました';
            }
        } else {
            $errors['blank'] = '＊メールアドレスとパスワードを入力してください';
        }
    }

    public function createUserValidation($users)
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
}
