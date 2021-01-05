<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
function listMeal($link)
{
  $diets = [];
  $mealsql = "SELECT create_at,meal FROM diets";
  if ($results = mysqli_query($link, $mealsql)) {
    while ($diet = mysqli_fetch_assoc($results)) {
      $diets[] = $diet;
    }
  }
  mysqli_free_result($results);
  return $diets;
}

$link = dbConnect();
$diets = listMeal($link);
mysqli_close($link);


$title = "食事ページ";
$content = __DIR__ . "/views/meal.php";
include __DIR__ . "/views/layout.php";
