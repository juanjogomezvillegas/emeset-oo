<?php

function Auth($request, $response, $container, $next)
{
    $conn = $request->get("SESSION", "conn");

    if ($conn == 1) {
        $user = $request->get("SESSION", "user");
        $pass = $request->get("SESSION", "pass");
        $dbname = $request->get("SESSION", "dbname");

        $connection = $container->dbConnection($user, $pass, $dbname);

        $response->set("connection", $connection);

        $response = $next($request, $response, $container);
    } else {
        $response->redirect("Location: index.php?r=login");
    }

    return $response;
}
