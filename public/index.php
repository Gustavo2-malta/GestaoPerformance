<?php

header("Content-Type: text/html; charset=utf-8");
require_once("../config/config.php");
require_once("../src/vendor/autoload.php");


use Src\Classes\ClassRoutes;

// $_SESSION['userId'];

$dispatch = new App\Dispatch();

