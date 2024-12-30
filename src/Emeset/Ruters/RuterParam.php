<?php

/**
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Ruter a partir d'un parametre d'entrada.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Ruter que escull quin controlador s'ha d'executar
 *
**/

namespace Emeset\Ruters;

class RuterParam
{
    public \Emeset\Container $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
}
