<?php

function Login($request, $response, $container)
{
    $error = $request->get("INPUT_GET", "error");

    if (isset($error)) {
        $response->set("error", $error);
    }

    $response->set("dbname", $container->config["db"]["dbname"]);

    $response->setTemplate("login.php");

    return $response;
}
