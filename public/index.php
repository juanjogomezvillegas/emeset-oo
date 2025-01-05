<?php

require_once "../src/config.php";

$container = \Emeset\Container::instance($config);
$request = $container->request();
$response = $container->response();

// captura l'entrada
$r = "";
if ($request->has("INPUT_REQUEST","r")) {
    $r = $request->getRaw("INPUT_REQUEST","r");
} else {
    $r = "home";
}

// estableix una ruta
$container->setRoute($r, $config["routes"][$r][1]);

// executa una ruta
$container->run($request, $response, $container);
