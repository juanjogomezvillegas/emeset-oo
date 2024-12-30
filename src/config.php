<?php

$config = array();

$config["db"] = [];
$config["db"]["user"] = "";
$config["db"]["pass"] = "";
$config["db"]["dbname"] = "dbname";
$config["db"]["host"] = "localhost";

// controladors
require_once "../src/Controllers/index.php";
require_once "../src/Controllers/login.php";
require_once "../src/Controllers/dologin.php";
require_once "../src/Controllers/logout.php";

// middlewares
require_once "../src/Middlewares/auth.php";

/**
 * Carreguem les classes del Framework Emeset
 * **/
require_once "../src/Emeset/Http/Request.php";
require_once "../src/Emeset/Http/Response.php";
require_once "../src/Emeset/Container.php";
