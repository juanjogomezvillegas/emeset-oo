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
    public $sql;
    public \Emeset\Http\Request $request;
    public \Emeset\Http\Response $response;

    public function __construct($config, $path = "../src/views/")
    {
        $this->config = $config;
        $this->request = new \Emeset\Http\Request();
        $this->response = new \Emeset\Http\Response($path);
    }

    public function request()
    {
        return $this->request;
    }

    public function response()
    {
        return $this->response;
    }

    public function dbConnection($user, $pass)
    {
        $this->sql = new \Db($user, $pass, $this->config["db"]["dbname"], $this->config["db"]["host"]);

        return $this->sql;
    }
}
