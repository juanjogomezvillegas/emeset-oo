<?php

/**
 * Exemple per a M07.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Objecte que encapsula la resposta.
 **/

namespace Emeset;

/**
 * Response: Objecte que encapsula la resposta.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Per guarda tota la informació de la resposta.
 **/
class Response
{
    private $values = [];
    private $header = false;
    private $redirect = false;
    private $template;
    private $path;

    /**
     * __construct:  Té tota la informació per crear la resposta
     * **/
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * set: obté un valor de l'entrada especificada amb el filtre indicat
     * **/
    public function set($id, $value)
    {
        $this->values[$id] = $value;
    }

    /**
     * get: obté un valor de l'entrada especificada amb el filtre indicat
     * **/
    public function get($id)
    {
        return $this->values[$id];
    }

    /**
     * setSession: guarda un valor a la sessió
     */
    public function setSession($id, $value)
    {
           $_SESSION[$id] = $value;
    }

    /**
     * unsetSession: Esborra el valor indicat de la sessió
     */
    public function unsetSession($id)
    {
        unset($_SESSION[$id]);
    }

    /**
     * setCookie: funció afegida per consistència crea una cookie.
     *
     * Accepta exament els mateixos paràmetres que la funció setcookie de php.
     */
    public function setCookie($name, $value = "", $expire = 0, $path = "", $domain = "", $secure = false, $httponly = false)
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    /**
     * setHeader: Afegeix una capçalera http a la resposta
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * redirect: Defineix la resposta com una redirecció. (accepta els mateixos paràmetres que header)
     *
     * @param  string $header capçalera http amb la
     *                        redirecció
     * @return void
     */
    public function redirect($header)
    {
        $this->setHeader($header);
        $this->redirect = true;
    }

    /**
     * setTemplate: defineix quina plantilla utilitzarem per la resposta.
     */
    public function setTemplate($p)
    {
        $this->template = $p;
    }

    /**
     * response: Genera la resposta HTTP
     */
    public function response()
    {
        if ($this->redirect) {
            header($this->header);
        } else {
            if ($this->header !== false) {
                header($this->header);
            }
            extract($this->values);
            include $this->path . $this->template;
        }
    }
}