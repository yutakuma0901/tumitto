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
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();
$dbHost = $_ENV['DB_HOST'];
$dbUsername = $_ENV['DB_USERNAME'];
$dbPassword = $_ENV['DB_PASSWORD'];
$dbDatabase = $_ENV['DB_DATABASE'];
$dsn = 'mysql:dbname=' . $dbDatabase . ';host=' . $dbHost . ';';
try {
        $db = new PDO($dsn, $dbUsername,$dbPassword);
        
    } catch(PDOException $e) {
        echo"接続失敗:" . $e->getMessage() . "\n";
        exit();
        return $db;
    }
