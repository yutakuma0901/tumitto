<!-- ランニング詳細ページ（クエリパラメーター）-->
<h2>ランニングページ</h2>
<?php
    $id = $_REQUEST['id'];
    if(!is_numeric($id) || $id <= 0) {
        print('1以上の数字で入力してください');
        exit();
    }

    $diets = $db->prepare('SELECT aerobicexercise FROM diets WHERE id=?');
    $diets->execute(array($id));
    $diet = $diets->fetch();
?>
<article>
  <pre><?php print($diet['aerobicexercise']); ?></pre>
</article>


<p><a href="aerobicexercise.php">戻る</a></p>
