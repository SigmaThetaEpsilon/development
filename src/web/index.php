<?php

define('APP_PATH', __DIR__ . '/../application/');
require(APP_PATH . 'App.php');

session_name('SID');
$sessionOptions = session_get_cookie_params();
$sessionOptions['secure'] = true;
$sessionOptions['httponly'] = true;
session_set_cookie_params($sessionOptions);

session_start();

$docRoot = $_SERVER['DOCUMENT_ROOT'];
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
// TODO - POST values
// TODO - Query params

App::ProcessRequest($docRoot, $requestUri, $requestMethod);

session_close();

?>