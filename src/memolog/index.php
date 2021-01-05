<?php
require_once __DIR__ . '/lib/mysqli.php';
require_once __DIR__ . '/lib/escape.php';

function ListMemos($link)
{
  $sql = <<<EOT
SELECT
  title,
  plans,
  scheduled,
  place,
  details
FROM memos
EOT;
  if ($result = mysqli_query($link, $sql)) {
    while ($list = mysqli_fetch_assoc($result)) {
        $lists[] = $list;
    }
  }
  mysqli_free_result($result);
  return $lists;
}

$link = dbConnect();
$lists = ListMemos($link);
$title = '読書ログの一覧';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
?>
