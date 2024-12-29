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
    private $config;
    private \Emeset\Request $request;
    private \Emeset\Response $response;
    private \Controller $controller;

    public function __construct($config, $path = "../src/views/")
    {
        $this->config = $config;
        $this->request = new \Emeset\Request();
        $this->response = new \Emeset\Response($path);
        $this->controller = new \ControllerIndex();

        $this->response->setCookie("connected", 0);
    }

    public function selectRoute()
    {
        // captura l'entrada
        $r = '';
        if ($this->request->has("INPUT_REQUEST","r")) {
            $r = $this->request->getRaw("INPUT_REQUEST","r");
        }

        // selecciona un controlador
        switch ($r) {
            case "":
                $this->changeController(new \MiddleLogat(new \ControllerIndex()));
                break;
            case "login":
                $this->changeController(new \ControllerLogin());
                break;
            case "dologin":
                $this->changeController(new \ControllerDologin());
                break;
            case "logout":
                $this->changeController(new \ControllerLogout());
                break;
            default:
                throw new \Exception("Opció no vàlida.");
        }

        // executa el controlador
        $this->runController();

        // retorna la resposta
        $this->response->response();
    }

    private function runController()
    {
        $this->controller->run($this->request, $this->response, $this->config);
    }

    private function changeController(\Controller $controller)
    {
        $this->controller = $controller;
    }
}
