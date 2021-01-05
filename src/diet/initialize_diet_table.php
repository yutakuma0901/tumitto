<?php
require __DIR__ . '/lib/mysqli.php';

function dropTable($link) {
    $droptablesql = "DROP TABLE diets";
    $result = mysqli_query($link, $droptablesql);
    if (!$result) {
        error_log('Error; fail to drop diets');
        error_log('Debugging Error; ' . mysqli_error($link));
    };
}

// function createTable($link) {
//     $createsql = <<<EOT
// CREATE TABLE diets (
//     id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     aerobicexercise INTEGER,
//     muscletraining INTEGER,
//     meal VARCHAR(1000),
//     sleep VARCHAR(100),
//     create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
// ) DEFAULT CHARACTER SET=utf8mb4;
// EOT;

//     $result = mysqli_query($link, $createsql);
//     if (!$result) {
//         error_log('Error; fail to create reading');
//         error_log('Debugging Error; ' . mysqli_error($link));
//     };
// }
function createTable($link) {
    $createsql = <<<EOT
CREATE TABLE diets (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    aerobicexercise INTEGER,
    muscletraining INTEGER,
    meal VARCHAR(1000),
    sleep VARCHAR(100),
    create_at DATETIME NOT NULL DEFAULT CURRENT_DATETIME
) DEFAULT CHARACTER SET=utf8mb4;
EOT;

    $result = mysqli_query($link, $createsql);
    if (!$result) {
        error_log('Error; fail to create reading');
        error_log('Debugging Error; ' . mysqli_error($link));
    };
}

$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
