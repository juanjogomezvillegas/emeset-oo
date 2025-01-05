<?php

function Dologin($request, $response, $container)
{
    $user = $request->get("INPUT_POST", "user");
    $pass = $request->get("INPUT_POST", "pass");
    $conn = 0;
    
    $connection = $container->dbConnection($user, $pass);

    if ($connection != null) {
        $conn = 1;
    }

    if ($conn == 0) {
        $response->redirect("Location: index.php?r=login&error=1");
    } else {
        $response->setSession("conn", $conn);
        $response->setSession("user", $user);
        $response->setSession("pass", $pass);

        $response->redirect("Location: index.php");
    }

    return $response;
}
