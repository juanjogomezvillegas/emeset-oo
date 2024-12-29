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

        $response->setCookie("connected", 1);

        $response->redirect("Location: index.php?name=$user");
    }
}
