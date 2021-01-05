<?php
require __DIR__ . "/lib/mysqli.php";
require __DIR__ . "/lib/escape.php";

//手続き型mysql
// function listAerobicexercise($link){
//     $diets = [];
//     $aerobicexercisesql = "SELECT create_at,aerobicexercise FROM diets";
//     if($results = mysqli_query($link, $aerobicexercisesql)) {
//         while($diet = mysqli_fetch_assoc($results)) {
//             $diets[] = $diet;
//         }
//     }
//     mysqli_free_result($results);
//     return $diets;
// }

//オブジェクト型mysql

if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
$start = 5 * ($page - 1);
$diets = $db->prepare('SELECT create_at,aerobicexercise,id FROM diets ORDER BY id DESC LIMIT ?, 5');
$diets->bindParam(1, $start, PDO::PARAM_INT);
$diets->execute();



//手続き型
// while ($diet = $diets->fetch()) {
//     print($diet['aerobicexercise'] . "\n");

// }

// $link = dbConnect();
// $diets = listAerobicexercise($link);
// mysqli_close($link);


$title = "ランニングページ";
$content = __DIR__ . "/views/aerobicexercise.php";
include __DIR__ . "/views/layout.php";
