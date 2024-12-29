<?php

/**
 * strategy concret
 * **/
class ControllerLogout implements \Controller
{
    
    public function run(&$request, &$response, &$config)
    {
        $config = $request->get("SESSION", "config");

        $response->setCookie("connected", 0);

        $response->redirect("Location: index.php");
    }
}
