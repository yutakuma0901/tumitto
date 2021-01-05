<?php
require_once __DIR__ . '/lib/mysql.php';
require_once __DIR__ . '/lib/escape.php';

function listReadings($link) {
    $readings = [];
    $sql = 'SELECT title,creator,situation,points,impression FROM readings';
    $results = mysqli_query($link,$sql);
    while($reading = mysqli_fetch_assoc($results)) {
        $readings[] = $reading;
    }

    mysqli_free_result($results);
    return $readings;
}

$link = dbConnect();
$readings = listReadings($link);

$title = '読書ログの一覧';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
