<?php
$str = '';

$str = '';
function Escape($str) {

    return htmlspecialchars($str,ENT_QUOTES,"UTF-8");

}
$str = Escape($str);
