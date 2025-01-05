<?php

require_once "../src/config.php";

$container = \Emeset\Container::instance($config);
$request = $container->request();
$response = $container->response();

// captura l'entrada
$r = "";
if ($request->has("INPUT_REQUEST","r")) {
    $r = $request->getRaw("INPUT_REQUEST","r");
}

// selecciona un controlador
switch ($r) {
    case "":
        $container->setRoute("home", "Auth");
        break;
    case "login" || "dologin" || "logout":
        $container->setRoute($r);
        break;
    default:
        throw new Exception("Opció no vàlida.");
}

$container->run($request, $response, $container);
