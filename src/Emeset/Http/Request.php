<?php

/**
 * Exemple per a M07.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe gestiona la petició HTTP.
 **/

namespace Emeset\Http;

/**
* Request: Classe gestiona la petició HTTP.
*
* @author: Dani Prados dprados@cendrassos.net
*
* Encapsula la petició HTTP per permetre llegir-la com una entrada.
**/
class Request
{
    /**
     * __construct: Crear el petició http
     * **/
    public function __construct()
    {
        session_start();
    }

    /**
     * get: obté un valor de l'entrada especificada amb el filtre indicat
     * **/
    public function get($input, $id, $filter = FILTER_DEFAULT, $options = 0)
    {
        $result = null;
        if ($input === 'SESSION') {
            if (isset($_SESSION[$id])) {
                $result = $_SESSION[$id];
            }
        } elseif ($input === 'COOKIE') {
            if (isset($_COOKIE[$id])) {
                $result = $_COOKIE[$id];
            }
        } elseif ($input === 'FILES') {
            if (isset($_FILES[$id])) {
                $result = $_FILES[$id];
            }
        } elseif ($input === 'INPUT_REQUEST') {
            if (isset($_REQUEST[$id])) {
                $var = $_REQUEST[$id];
                $result = filter_var($var, $filter, $options);
            }
        } elseif ($input === 'INPUT_GET') {
            if (isset($_GET[$id])) {
                $var = $_GET[$id];
                $result = filter_var($var, $filter, $options);
            }
        } elseif ($input === 'INPUT_POST') {
            if (isset($_POST[$id])) {
                $var = $_POST[$id];
                $result = filter_var($var, $filter, $options);
            }
        } else {
            if ($filter == "FILTER_SANITIZE_STRING") {
                $result = filter_input($input, $id, FILTER_DEFAULT, $options);
                if (isset($result)) {
                    $result = htmlspecialchars($result);
                }
            } else {
                $result = filter_input($input, $id, $filter, $options);
            }
        }

        return $result;
    }

    /**
     * getRaw: obté un valor de l'entrada especificada sense filtrar
     * **/
    public function getRaw($input, $id, $options = 0)
    {
        return $this->get($input, $id, FILTER_DEFAULT, $options);
    }

    /**
     * has: retorna true si l'entrada especificada existeix i false si no.
     * **/
    public function has($input, $id)
    {
        $result = false;
        if ($input === 'SESSION') {
            $result = isset($_SESSION[$id]);
        } elseif ($input === 'FILES') {
            $result = isset($_FILES[$id]);
        } elseif ($input === "INPUT_REQUEST") {
            $result = isset($_REQUEST[$id]);
        } else {
            $result = !is_null(filter_input($input, $id, FILTER_DEFAULT));
        }
        return $result;
    }
}
