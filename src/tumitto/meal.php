<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
$start = 5 * ($page - 1);
$diets = $db->prepare('SELECT create_at,meal,id FROM diets ORDER BY id DESC LIMIT ?, 5');
$diets->bindParam(1, $start, PDO::PARAM_INT);
$diets->execute();

//手続き型mysql
// function listMeal($link)
// {
//   $diets = [];
//   $mealsql = "SELECT create_at,meal FROM diets";
//   if ($results = mysqli_query($link, $mealsql)) {
//     while ($diet = mysqli_fetch_assoc($results)) {
//       $diets[] = $diet;
//     }
//   }
//   mysqli_free_result($results);
//   return $diets;
// }

// $link = dbConnect();
// $diets = listMeal($link);
// mysqli_close($link);


$title = "食事ページ";
$content = __DIR__ . "/views/meal.php";
include __DIR__ . "/views/layout.php";
