<?php

define('APP_PATH', __DIR__ . '/../application/');
require(APP_PATH . 'App.php');

$docRoot = $_SERVER['DOCUMENT_ROOT'];
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$postValues = $_POST;
$getValues = $_GET;

App::ProcessRequest($docRoot, $requestUri, $requestMethod, $postValues, $getValues);

?>