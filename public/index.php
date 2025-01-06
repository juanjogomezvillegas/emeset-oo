<?php

require_once "../src/config.php";

$emeset = new \Emeset\Emeset($config);
$request = $emeset->request();
$response = $emeset->response();

// captura l'entrada
$r = "";
if ($request->has("INPUT_REQUEST","r")) {
    $r = $request->getRaw("INPUT_REQUEST","r");
} else {
    $r = "home";
}

// estableix una ruta
$emeset->setRoute($r, $config["routes"][$r][1]);

// executa una ruta
$emeset->run($request, $response, $emeset);
