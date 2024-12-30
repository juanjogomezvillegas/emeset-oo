<?php

function Login($request, $response, $container)
{
    $response->setTemplate("login.php");

    return $response;
}
