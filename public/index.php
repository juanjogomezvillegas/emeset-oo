<?php

require_once "../src/config.php";

$container = new \Emeset\Container($config);
$request = $container->request();
$response = $container->response();

// captura l'entrada
$r = '';
if ($request->has("INPUT_REQUEST","r")) {
    $r = $request->getRaw("INPUT_REQUEST","r");
}

// selecciona un controlador
switch ($r) {
    case "":
        $response = MiddleLogat($request, $response, $container, "ControllerIndex");
        break;
    case "login":
        $response = ControllerLogin($request, $response, $container);
        break;
    case "dologin":
        $response = ControllerDologin($request, $response, $container);
        break;
    case "logout":
        $response = ControllerLogout($request, $response, $container);
        break;
    default:
        echo "Opció no vàlida.";
}

$response->response();
