<form action="create.php" method="post">
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach ; ?>
    </ul>
    <section>
        <div>
            <label>ランニング</label>
            <input type="text" name="aerobicexercise" id="aerobicexercise" value="<?php echo $diets['aerobicexercise'] ?>">分
        </div>

        <div>
            <label>筋トレ</label>
            <input type="text" name="muscletraining" id="muscletraining" value="<?php echo $diets['muscletraining'] ?>">セット
        </div>
        <div>
            <label>食事</label>
            <input type="textarea" name="meal" id="meal" value="<?php echo $diets['meal'] ?>">
        </div>
        <div>
            <label>睡眠</label>
            <input type="text" name="sleep" id="sleep" value="<?php echo $diets['sleep'] ?>">
        </div>
        <input type="submit" value="送信">
    </section>
    <p><a href="index.php">ダイエットホームへ</a></p>

    <footer>
    </footer>
</form>
