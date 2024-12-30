<?php

function Dologin($request, $response, $container)
{
    $user = $request->get("INPUT_POST", "user");
    $pass = $request->get("INPUT_POST", "pass");

    $response->setSession("connected", 1);

    $response->redirect("Location: index.php?name=$user");

    return $response;
}
