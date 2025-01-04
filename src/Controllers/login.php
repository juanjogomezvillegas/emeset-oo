<?php

function Login($request, $response, $container)
{
    $error = $request->get("INPUT_GET", "error");

    if (isset($error)) {
        $response->set("error", $error);
    }

    $response->setTemplate("login.php");

    return $response;
}
