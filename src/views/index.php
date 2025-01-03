<!doctype html>
<html lang="ca">
    <head>
        <?php include "../src/min.views/head.php"; ?>
        <title>Bootstrap demo</title>
    </head>

    <body>
        <h1 class="text-center">Benvingut a Emeset millorat per GEINF!</h1>
        <div class="container text-left">
            <div class="row">
                <div class="col">
                    <p>El "Framework" per estudiants de 2n de DAW, millorat gràcies a l'assignatura enginyeria del software II de GEINF de la UdG.</p>
                    <?php if (isset($name)) { ?>
                        <p><?= $name; ?></p>
                        <a href="http://192.168.0.10/emeset-oo/public/index.php?r=logout">logout</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include "../src/min.views/script.php"; ?>
    </body>
</html>
