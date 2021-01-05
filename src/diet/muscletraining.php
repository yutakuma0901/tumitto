<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";
function listMuscletraining($link)
{
  $diets = [];
  $muscletrainingsql = "SELECT create_at,muscletraining FROM diets";
  if ($results = mysqli_query($link, $muscletrainingsql)) {
    while ($diet = mysqli_fetch_assoc($results)) {
      $diets[] = $diet;
    }
  }
  mysqli_free_result($results);
  return $diets;
}

$link = dbConnect();
$diets = listMuscletraining($link);
mysqli_close($link);


$title = "筋トレページ";
$content = __DIR__ . "/views/muscletraining.php";
include __DIR__ . "/views/layout.php";
