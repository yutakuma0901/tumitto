<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="stylesheets/css/app.css">
  <title><?php echo $title; ?></title>
</head>

<body>
  <header class='navbar border-bottom  shadow-sm p-3 mb-5 text-dark'>
    <h1 class="h2">
      <a class="text-body text-decoration-none" href="index.php">メモアプリ</a>
    </h1>
  </header>

  <div class="container">
    <?php include $content; ?>
  </div>
</body>
