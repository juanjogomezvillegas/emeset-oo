<?php

function Dologin($request, $response, $container)
{
    $user = $request->get("INPUT_POST", "user");
    $pass = $request->get("INPUT_POST", "pass");
    $conn = 0;

    if ($container->dbLogin($user, $pass)) {
        $conn = 1;
    }

    if ($conn == 0) {
        $response->redirect("Location: index.php?r=login&error=1");
    } else {
        $response->setSession("conn", $conn);

        $response->redirect("Location: index.php");
    }

    return $response;
}
