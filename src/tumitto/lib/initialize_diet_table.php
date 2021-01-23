<?php
require __DIR__ . '/mysqli.php';

function dropTableUsers($db) {
    $droptablesql = "DROP TABLE users";
    $stmt = $db->query($droptablesql);

    echo '削除が完了しました';
}

function dropTableDiets($db) {
    $droptablesql = "DROP TABLE diets";
    $stmt = $db->query($droptablesql);

    echo '削除が完了しました' . PHP_EOL;
}

function dropTablePosts($db) {
    $droptablesql = "DROP TABLE posts";
    $stmt = $db->query($droptablesql);

    echo '削除が完了しました' . PHP_EOL;
}



function createDietsTable($db) {
    $dietssql = <<<EOT
CREATE TABLE diets (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER,
    aerobicexercise INTEGER,
    muscletraining INTEGER,
    meal VARCHAR(1000),
    sleep VARCHAR(100),
    create_at TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;

    $stmt = $db->query($dietssql);

    echo '登録が完了しました';

}

function createUsersTable($db)
{
    $usersql = <<<EOT
CREATE TABLE users (
    login_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(100),
    image VARCHAR(255),
    created DATETIME ,
    modified TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;

    $stmt = $db->query($usersql);

    echo '登録が完了しました';
}

function createPostsTable($db)
{
    $postsql = <<<EOT
CREATE TABLE posts (
    post_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    message TEXT,
    post_user_id INTEGER,
    reply_message_id INTEGER,
    created DATETIME ,
    modified TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;

    $stmt = $db->query($postsql);

    echo '登録が完了しました';
}



//dropTableDiets($db);
//dropTableUsers($db);
//dropTablePosts($db);

//createDietsTable($db);
//createUsersTable($db);
//createPostsTable($db);
//saveDbPostData($db,$user);
