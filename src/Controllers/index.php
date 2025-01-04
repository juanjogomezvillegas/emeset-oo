<?php

function Index($request, $response, $container)
{
    $response->setTemplate("index.php");

    return $response;
}
