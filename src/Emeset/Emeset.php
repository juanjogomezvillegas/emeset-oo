<?php

/**
 * Exemple per a M07.
 *
 * @author: Juan José Gómez Villegas juanjogomvil@gmail.com
 *
 * Classe emeset, la responsabilitat d'instaciar els models i altres objectes hereta del contenidor.
 **/

namespace Emeset;

/**
 * Emeset: Classe emeset.
 *
 * @author: Juan José Gómez Villegas juanjogomvil@gmail.com
 *
 * Classe emeset, la responsabilitat d'instaciar els models i altres objectes hereta del contenidor.
 **/
class Emeset extends Container
{
    public function __construct($config, $path = "../src/views/")
    {
        parent::__construct($config, $path);
    }

    // instanciar aquí els vostres models
}
