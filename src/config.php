<?php

$config = array();

$config["db"] = [];
$config["db"]["connected"] = 1;
$config["db"]["user"] = "";
$config["db"]["pass"] = "";
$config["db"]["dbname"] = "dbname";
$config["db"]["host"] = "localhost";

// controladors
require_once "../src/Controllers/controller.php";
require_once "../src/Controllers/index.php";
require_once "../src/Controllers/login.php";
require_once "../src/Controllers/dologin.php";
require_once "../src/Controllers/logout.php";

// middleware
require_once "../src/Middlewares/middleware.php";
require_once "../src/Middlewares/middleLogat.php";

/**
 * Carreguem les classes del Framework Emeset
 * **/
require_once "../src/Emeset/Request.php";
require_once "../src/Emeset/Response.php";
require_once "../src/Emeset/Container.php";
