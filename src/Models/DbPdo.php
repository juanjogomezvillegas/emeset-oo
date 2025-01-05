<?php

class DbPdo implements Db
{
    public $sql;

    public function connection($user, $pass, $db, $host)
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

    public function select($query)
    {
        //
    }

    public function insert($insert)
    {
        //
    }

    public function update($update)
    {
        //
    }

    public function delete($delete)
    {
        //
    }
}
