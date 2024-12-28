<?php

/**
 * Interfície de l'strategy
 * **/
interface Controller
{
    public function run(&$request, &$response, &$config);
}
