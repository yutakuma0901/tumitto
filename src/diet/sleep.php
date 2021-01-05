<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
function listSleep($link)
{
  $diets = [];
  $sleepsql = "SELECT create_at,sleep FROM diets";
  if ($results = mysqli_query($link, $sleepsql)) {
    while ($diet = mysqli_fetch_assoc($results)) {
      $diets[] = $diet;
    }
  }
  mysqli_free_result($results);
  return $diets;
}

$link = dbConnect();
$diets = listSleep($link);
mysqli_close($link);


$title = "睡眠ページ";
$content = __DIR__ . "/views/sleep.php";
include __DIR__ . "/views/layout.php";
