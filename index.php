<?php
session_start();
require_once 'autoload.php';
require_once("config/parameters.php");
require_once("config/config.php");

Utils::validateURL();
$router = new Router();
$router->run();
