<?php

interface Db
{
    function connection($user, $pass, $db, $host);

    function getConnection();

    function select($query);

    function insert($insert);

    function update($update);

    function delete($delete);
}
