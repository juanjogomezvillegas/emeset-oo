# Emeset lite OOP

## El framework per estudiants de 2n DAW, millorat

Versió lite amb orientació a objectes del "Framework" [Emeset](https://github.com/Emeset-mvc/emeset-lite), creat per Dani Prados.

L'objectiu d'Emeset era introduir el patró MVC (Model- Vista-Controlador) utilitzant funcionalitats bàsiques del llenguatge PHP.

Aquesta versió intenta millorar l'antiga versió, ja que ara ha estat dissenyat mitjançant alguns patrons apresos a l'assignatura d'enginyeria del software II, de la carrera d'enginyeria informàtica de la UdG.

## Kernel

El nucli del framework són les classes request i response, que contenen una petició i una resposta, i serà responsabilitat del container (contenidor) instanciar aquestes dues classes, *a més d'altres classes*. i per tal de quan s'afegeixen nous models no haver d'editar el contenidor, els nous models s'instancien a la classe emeset que hereta de contenidor.

Des de la part pública només s'interacciona amb la classe emeset (filla del container), i a partir del paràmetre **r** de tipus get, carrega un controlador o un altre. Els controladors és declaren al fitxer config.php.

## Controladors

Per simplificar els controladors són funcions tal com.

```php
public function controller($request, $response, $container) {...}
```

## Middleware

Els middlewares són funcions tal com.

```php
public function middleware($request, $response, $container, $next) {...}
```

on **$next** és el controlador que s'executarà a dins del middleware.

## Desplegament

Per executar el framework només cal editar el fitxer **config.php** com.

```sh
$ cd src
$ nano config.php
```

Fitxer **config.php**.

```php
$config = array();

$config["db"] = [];
$config["db"]["dbname"] = "dbname";
$config["db"]["host"] = "localhost";
```

on **dbname** és el nom de la base de dades, i **localhost** és el nom o ip del servidor de la base de dades.

I després cal executar les comandes.

```sh
$ cd ..
$ cd public
$ php -s localhost:8081
```
