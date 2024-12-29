<!doctype html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="./css/index.css" type="text/css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxj">
    </head>

    <body>
        <div class="container">
            <h1>Benvingut a Emeset millorat per GEINF!</h1>
            <p>El "Framework" per estudiants de 2n de DAW, millorat gràcies a l'assignatura enginyeria del software II de GEINF de la UdG.</p>
            <?php if (isset($name)) { ?>
                <p><?= $name; ?></p>
            <?php } ?>
            <br>
            <a href="http://192.168.0.10/emeset-oo/public/index.php?r=logout">logout</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f"></script>
    </body>
</html>
