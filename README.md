# Emeset lite OOP

## El framework per estudiants de 2n DAW, millorat incloent patrons de software

Versió lite amb orientació a objectes del "Framework" [Emeset](https://github.com/Emeset-mvc/emeset-lite).

L'objectiu d'Emeset és introduir el patró MVC (Model- Vista-Controlador) utilitzant funcionalitats bàsiques del llenguatge PHP.

Aquesta versió intenta millorar l'antiga versió, ja que ara ha estat dissenyat mitjançant alguns patrons apresos a l'assignatura d'enginyeria del software II, a la carrera d'enginyeria informàtica de la UdG.

## Kernel

El nucli del framework són les classes request i response, que contenen una petició i una resposta, i serà responsabilitat del container (contenidor) instanciar aquestes dues classes, de container només es crearà una instància (patró Singleton).

A les classes request i response també tindria sentit aplicar el patró Singleton, només si ens volem assegurar de què es pugui crear una sola instància de cada classe.

## Controladors

La classe container gestiona els controladors mitjançant el patró Strategy.

Per simplificar, els controladors són classes que només tenen una funció run que rep com entrada el request, la response, i el config.

Per forçar a que tots els controladors tinguin el mateix mètode run amb els mateixos paràmetres, serveix la interfícia Controller.

La resta funciona igual que abans.

## Middleware

Els middlewares té sentit aplicar-hi el patró Decorator, ja que un middleware és una classe que embolcalla un controlador, però els controladors es gestionen amb un Strategy i interfícies, per tant, el patró Decorator no es podria aplicar.

Pels middlewares és millor definir una interfície pròpia, **o millor**: una classe abstracta que implementi la interfìcie Controller.

```php
abstract class Middleware implements \Controller
{
    protected \Controller $next;

    public function __construct(\Controller $next)
    {
        $this->next = $next;
    }

    public abstract function run(&$request, &$response, &$config);
}
```

El mètode run dels middleware contindrà el codi del middleware i executarà el controller de la variable next.

És important que els paràmetres tinguin **&**, això significa que **el pas per paràmetres serà per referència**, els controladors estan treballant amb una referència a la posició de memòria on estan els paràmetres, i, per tant, si hi ha algun canvi en la petició o en la resposta o en el config, el container rebrà el canvi. Altrament es passarà per valor, i cada controller treballarà amb una còpia dels paràmetres.

## Front controller

Amb aquesta versió de Emeset orientat a objectes, el front controller que estava al fitxer index.php seria sempre el mateix, i la part que varia quedaria a la part privada.

**La part estàtica**

```php
class Index {
    private \Emeset\Container $container;

    public function __construct($config)
    {
        $this->container = new \Emeset\Container($config);
    }

    public function frontControler()
    {
        try {
            $this->container->selectRoute();
        } catch (Exception $e) {
            echo "Error! " . $e->getMessage() . "\n";
        }
    }
}

$index = new Index($config);

$index->frontControler();
```

**La part que varia**

```php
public function selectRoute()
{
    // captura l'entrada
    $r = '';
    if ($this->request->has("INPUT_REQUEST","r")) {
        $r = $this->request->getRaw("INPUT_REQUEST","r");
    }

    // selecciona un controlador
    switch ($r) {
        case "":
            $this->changeController(new \MiddleLogat(new \ControllerIndex()));
            break;
        case "login":
            $this->changeController(new \ControllerLogin());
            break;
        case "dologin":
            $this->changeController(new \ControllerDologin());
            break;
        default:
            throw new \Exception("Opció no vàlida.");
    }

    // executa el controlador
    $this->runController();

    // retorna la resposta
    $this->response->response();
}
```
