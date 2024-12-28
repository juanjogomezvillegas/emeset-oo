<?php

/**
 * strategy concret
 * **/
class ControllerLogin implements \Controller
{
    
    public function run(&$request, &$response, &$config)
    {
        $response->setTemplate("login.php");
    }
}
