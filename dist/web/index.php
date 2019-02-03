<?php

define('APP_PATH', __DIR__ . '/../application/');
require(APP_PATH . 'App.php');

// TODO - Session

$docRoot = $_SERVER['DOCUMENT_ROOT'];
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
// TODO - POST values
// TODO - Query params

App::ProcessRequest($docRoot, $requestUri, $requestMethod);

?>