<?php

/**
 * strategy concret
 * **/
class ControllerDologin implements \Controller
{
    
    public function run(&$request, &$response, &$config)
    {
        $user = $request->get("INPUT_POST", "user");
        $pass = $request->get("INPUT_POST", "pass");

        $config["db"]["user"] = $user;
        $config["db"]["pass"] = $pass;
        $config["db"]["connected"] = 1;

        $response->redirect("Location: index.php?name=$user");
    }
}
