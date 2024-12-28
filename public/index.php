<?php

require_once "../src/config.php";

/**
 * Classe index
 * **/
class Index {
    private \Emeset\Container $container;

    public function __construct($config)
    {
        $this->container = new \Emeset\Container($config);
    }

    public function frontControler()
    {
        try {
            $this->container->selectRoute();
        } catch (Exception $e) {
            echo "Error! " . $e->getMessage() . "\n";
        }
    }
}

$index = new Index($config);

$index->frontControler();
