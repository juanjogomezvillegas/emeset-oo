<?php

class Db
{
    public $sql;

    public function __construct($user, $pass, $db, $host)
    {
        $dsn = "mysql:dbname={$db};host={$host}";
        try {
            $this->sql = new \PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $this->sql = null;
        }
    }

    public function getConnection()
    {
        return $this->sql;
    }
}
