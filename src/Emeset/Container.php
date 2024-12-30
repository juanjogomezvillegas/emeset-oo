<?php

/**
 * Exemple per a M07.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe contenidor,  té la responsabilitat d'instaciar els models i altres objectes.
 **/

namespace Emeset;

/**
 * Container: Classe contenidor.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe contenidor, la responsabilitat d'instaciar els models i altres objectes.
 **/
class Container
{
    public $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function request()
    {
        return new \Emeset\Http\Request();
    }

    public function response($path = "../src/views/")
    {
        return new \Emeset\Http\Response($path);
    }

    public function ruter()
    {
        return new \Emeset\Ruters\RuterParam($this);
    }
}
