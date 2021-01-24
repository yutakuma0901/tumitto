<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
$content = __DIR__ . "/views/index.php";
$title = 'ダイエットホームページ';

session_start();

$user = getLoginUser($db);
$getcountdiet = current(getCountDiets($db));
$getcountuser = current(getCountUsers($db));
include __DIR__ . "/views/layout.php";
