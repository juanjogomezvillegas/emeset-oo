<!doctype html>
<html lang="ca">
    <head>
    <?php include "../src/min.views/head.php"; ?>
    <title>Login | Bootstrap demo</title>
    </head>

    <body class="bg-info-subtle">
        <h1 class="text-center">Login</h1>
        <div class="container text-center">
            <?php if (isset($error)) { ?>
                <?php if ($error == 1) { ?>
                    <div class="alert alert-danger" role="alert">
                        Error! Failed to login.
                    </div>
                <?php } ?>
            <?php } ?>
            <form class="row" action="index.php?r=dologin" method="POST">
                <div class="col"></div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="user" id="idUser" value="" class="form-control">
                        <label for="idUser">Username</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="password" name="pass" id="idPass" value="" class="form-control">
                        <label for="idPass">Password</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" name="dbname" id="idDbName" value="<?= $dbname; ?>" class="form-control">
                        <label for="idDbName">DB Name</label>
                    </div>
                    <br>
                    <input type="submit" name="send" value="login" class="btn btn-primary form-control">
                </div>
                <div class="col"></div>
            </form>
        </div>
        <?php include "../src/min.views/script.php"; ?>
    </body>
</html>
