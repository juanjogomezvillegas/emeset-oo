<?php

function Auth($request, $response, $container, $next)
{
    $conn = $request->get("SESSION", "conn");

    if ($conn == 1) {
        $response = $next($request, $response, $container);
    } else {
        $response->redirect("Location: index.php?r=login");
    }

    return $response;
}
