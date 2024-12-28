<?php

/**
 * strategy concret
 * **/
class ControllerLogout implements \Controller
{
    
    public function run(&$request, &$response, &$config)
    {
        $config = $request->get("SESSION", "config");

        $config["db"]["user"] = "";
        $config["db"]["pass"] = "";
        $config["db"]["connected"] = 0;

        $response->redirect("Location: index.php");
    }
}
