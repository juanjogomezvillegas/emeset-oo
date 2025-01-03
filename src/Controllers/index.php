<?php

function Index($request, $response, $container)
{
    $conn = $request->get("SESSION", "conn");

    $connection = null;
    if ($conn == 1) {
        $connection = $container->dbConnection();
    }

    if ($connection != null) {
        $response->set("connection", $connection);
    }

    $response->setTemplate("index.php");

    return $response;
}
