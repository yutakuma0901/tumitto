<?php
require_once __DIR__ . '/lib/mysqli.php';

function dropTables($link)
{
    $dropTablesql = "DROP TABLES IF EXISTS memos;";

    $result = mysqli_query($link, $dropTablesql);
    if($result){
        echo 'データベースの削除に成功しました' . PHP_EOL . PHP_EOL;
    } else {
        echo 'データベースの削除に失敗しました' . PHP_EOL . PHP_EOL;
        echo 'debugging error' . mysqli_error($link) . PHP_EOL;
    }
}

function createTables($link)
{
    $createTablesql = <<<EOT
CREATE TABLE memos (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) ,
    plans VARCHAR(100),
    scheduled VARCHAR(100),
    place VARCHAR(100),
    details VARCHAR(1000),
    create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;

    $result = mysqli_query($link, $createTablesql);
    if ($result) {
        echo 'データベースの作成に成功しました' . PHP_EOL . PHP_EOL;
    } else {
        echo 'データベースの作成に失敗しました' . PHP_EOL . PHP_EOL;
        echo 'debugging error' . mysqli_error($link) . PHP_EOL;
    }
}

$link = dbConnect();
dropTables($link);
createTables($link);
mysqli_close($link);
