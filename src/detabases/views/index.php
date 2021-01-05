
<a class='btn btn-primary mb-4' href="new.php">読書ログを登録する</a>

<main>
    <?php if(count($readings) > 0) : ?>
        <?php foreach ($readings as $reading) : ?>
            <div class='card shadow-sm mb-4'>
                <section class='card-body'>
                    <h2 class='card-title h4 text-dark mb-3'><?php echo escape($reading['title']); ?></h2>
                    <div class='small mb-3'>
                        <?php echo escape($reading['creator']); ?>&nbsp;|&nbsp;
                        <?php echo escape($reading['situation']); ?>&nbsp;|&nbsp;
                        <?php echo escape($reading['points']); ?>点
                    </div>
                    <p><?php echo nl2br(escape($reading['impression']),false); ?></p>
                </section>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>まだ会社情報が登録されていません</p>
        <?php endif; ?>

</main>
