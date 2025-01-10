<?php

function Logout($request, $response, $container)
{
    $response->setSession("conn", 0);
    $response->unsetSession("user");
    $response->unsetSession("pass");
    $response->unsetSession("dbname");

    $response->redirect("Location: index.php");

    return $response;
}
