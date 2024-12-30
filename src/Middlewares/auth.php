<?php

function Auth($request, $response, $container, $next)
{
    if (!$request->has("SESSION", "connected")) {
        $response->setSession("connected", 0);
    }

    $conn = $request->get("SESSION", "connected");

    if ($conn == 0) {
        $response->redirect("Location: index.php?r=login");
    } else {
        $response = $next($request, $response, $container);
    }

    return $response;
}
