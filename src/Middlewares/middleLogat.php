<?php

/**
 * Interfície dels middlewares
 * **/
class MiddleLogat extends \Middleware
{
    public function __construct(\Controller $next)
    {
        parent::__construct($next);
    }

    public function run(&$request, &$response, &$config) {
        if ($config["db"]["connected"] == 0) {
            $response->redirect("Location: index.php?r=login");
        } else {
            $this->next->run($request, $response, $config);
        }
    }
}
