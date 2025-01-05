<?php

/**
 * Exemple per a M07.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe contenidor,  té la responsabilitat d'instaciar els models i altres objectes.
 **/

namespace Emeset;

use Db;

/**
 * Container: Classe contenidor.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe contenidor, la responsabilitat d'instaciar els models i altres objectes.
 **/
class Container
{
    private static \Emeset\Container $container;
    public $config = [];
    public $controllers = [];
    public $controller = "";
    public $middleware = "";
    public $sql;
    public \Emeset\Http\Request $request;
    public \Emeset\Http\Response $response;

    private function __construct($config, $path = "../src/views/")
    {
        $this->config = $config;
        $this->controllers = $config["routes"];
        $this->request = new \Emeset\Http\Request();
        $this->response = new \Emeset\Http\Response($path);
        $this->sql = new \DbPdo();
    }

    public static function instance($config)
    {
        \Emeset\Container::$container = new \Emeset\Container($config);

        return \Emeset\Container::$container;
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
        $this->controller = $this->controllers[$r];
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

    public function dbConnection($user, $pass)
    {
        $this->sql->connection($user, $pass, $this->config["db"]["dbname"], $this->config["db"]["host"]);

        return $this->sql->getConnection();
    }
}
