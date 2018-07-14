<?php
//ob_start();

session_start();
//session_destroy();

defined("DS")? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONTEND")? null : define("TEMPLATE_FRONTEND", __DIR__ . DS . "templates" . DS ."frontend");

defined("TEMPLATE_BACKEND")? null : define("TEMPLATE_BACKEND", __DIR__ . DS . "templates" . DS . "backend");

defined("UPLOAD_DIRECTORY")? null : define("UPLOAD_DIRECTORY", __DIR__ . DS . "uploads");

defined("DB_HOST")? null : define("DB_HOST", "localhost");

defined("DB_USER")? null : define("DB_USER", "root");

defined("DB_PASSWORD")? null : define("DB_PASSWORD", "");

defined("DB_NAME")? null : define("DB_NAME", "php_e_commerce_store_db");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

require_once("functions.php");
require_once("cart.php");


































?>