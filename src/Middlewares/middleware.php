<?php

/**
 * Interfície dels middlewares
 * **/
abstract class Middleware implements \Controller
{
    protected \Controller $next;

    public function __construct(\Controller $next)
    {
        $this->next = $next;
    }

    public abstract function run(&$request, &$response, &$config);
}
