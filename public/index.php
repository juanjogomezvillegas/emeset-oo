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
        $response = Auth($request, $response, $container, "Index");
        break;
    case "login":
        $response = Login($request, $response, $container);
        break;
    case "dologin":
        $response = Dologin($request, $response, $container);
        break;
    case "logout":
        $response = Logout($request, $response, $container);
        break;
    default:
        echo "Opció no vàlida.";
}

$response->response();
