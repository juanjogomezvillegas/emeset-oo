<?php

$config = array();

$config["title"] = "Framework Emeset";
$config["author"] = "Juan José Gómez Villegas";
$config["version"] = "lite 1.0 of 2024-2025";
$config["db"] = [];
$config["db"]["dbname"] = "--";
$config["db"]["host"] = "localhost";
$config["routes"] = [];
$config["routes"]["home"] = ["Index", "Auth"];
$config["routes"]["login"] = ["Login", ""];
$config["routes"]["dologin"] = ["Dologin", ""];
$config["routes"]["logout"] = ["Logout", ""];

// models
require_once "../src/Models/Db.php";
require_once "../src/Models/DbPdo.php";

// controladors
require_once "../src/Controllers/index.php";
require_once "../src/Controllers/login.php";
require_once "../src/Controllers/dologin.php";
require_once "../src/Controllers/logout.php";

// middlewares
require_once "../src/Middlewares/auth.php";

// Carreguem les classes del Framework Emeset
require_once "../src/Emeset/Http/Request.php";
require_once "../src/Emeset/Http/Response.php";
require_once "../src/Emeset/Container.php";
