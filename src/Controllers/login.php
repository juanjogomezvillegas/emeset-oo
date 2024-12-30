<?php

function ControllerLogin($request, $response, $container)
{
    $response->setTemplate("login.php");

    return $response;
}
