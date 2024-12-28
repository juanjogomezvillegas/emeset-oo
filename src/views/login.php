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
            <h1>Pàgina de Login</h1>
            <form action="index.php?r=dologin" method="POST">
                <label for="idUser">Username</label>
                <input type="text" name="user" id="idUser" value="">
                <br>
                <label for="idPass">Password</label>
                <input type="password" name="pass" id="idPass" value="">
                <br>
                <input type="submit" name="send" value="send">
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f"></script>
    </body>
</html>
