<?php

function Logout($request, $response, $container)
{
    $response->setSession("connected", 0);

    $response->redirect("Location: index.php");

    return $response;
}
