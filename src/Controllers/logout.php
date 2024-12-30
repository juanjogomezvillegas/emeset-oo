<?php

function ControllerLogout($request, $response, $container)
{
    $config = $request->get("SESSION", "config");

    $response->setSession("connected", 0);

    $response->redirect("Location: index.php");

    return $response;
}
