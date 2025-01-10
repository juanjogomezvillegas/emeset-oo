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
    public $controllers = [];
    public $controller = "";
    public $middleware = "";
    public $sql;
    public \Emeset\Http\Request $request;
    public \Emeset\Http\Response $response;

    public function __construct($config, $path = "../src/views/")
    {
        $this->config = $config;
        $this->controllers = $config["routes"];
        $this->request = new \Emeset\Http\Request();
        $this->response = new \Emeset\Http\Response($path);
        $this->sql = new \DbPdo();
    }

    public function request()
    {
        return $this->request;
    }

    public function response()
    {
        return $this->response;
    }

    public function setRoute($r = "home", $middleware = "")
    {
        $this->middleware = $middleware;
        $this->controller = $this->controllers[$r][0];
    }

    public function run($request, $response, $container)
    {
        if ($this->middleware == "") {
            $aux = $this->controller;
            $this->response = $aux($request, $response, $container);
        } else {
            $aux = $this->middleware;
            $this->response = $aux($request, $response, $container, $this->controller);
        }

        $this->response->response();
    }

    public function dbConnection($user, $pass, $dbname)
    {
        $this->sql->connection($user, $pass, $dbname, $this->config["db"]["host"]);

        return $this->sql->getConnection();
    }
}
