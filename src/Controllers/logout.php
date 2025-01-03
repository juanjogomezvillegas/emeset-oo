<?php

function Logout($request, $response, $container)
{
    $response->setSession("conn", 0);

    $response->redirect("Location: index.php");

    return $response;
}
