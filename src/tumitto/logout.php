<?php
session_start();

$_SESSION = array();
if(ini_get('session.use_cookies')) {
    $prams = session_get_cookie_params();
    setcookie(
        session_name() ,
        '',
        time() - 42000,
        $prams['path'],
        $prams['domain'],
        $prams['secure'],
        $prams['httponly']
    );
}
session_destroy();

setcookie('email','', time() - 3600);

$title = 'tumitto-ログアウト';
$content = __DIR__ . '/views/logout.php';
include __DIR__ . '/views/home.layout.login.php';
