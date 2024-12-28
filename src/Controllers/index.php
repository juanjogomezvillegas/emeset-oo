<?php

/**
 * strategy concret
 * **/
class ControllerIndex implements \Controller
{
    
    public function run(&$request, &$response, &$config)
    {
        $name = $request->get("INPUT_GET", "name");
        
        $response->set("name", $name);

        $response->setTemplate("index.php");
    }
}
