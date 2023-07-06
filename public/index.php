<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Initialisation de certaines choses
use App\Controller\ContactController;
use App\Controller\IndexController;
use App\DependencyInjection\Container;
use App\Routing\RouteNotFoundException;
use App\Routing\Router;
use SpotifyWebAPI\SpotifyWebAPI;
use Symfony\Component\Dotenv\Dotenv;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use SpotifyWebAPI\Session;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

// DB
[
  'DB_HOST'     => $host,
  'DB_PORT'     => $port,
  'DB_NAME'     => $dbname,
  'DB_CHARSET'  => $charset,
  'DB_USER'     => $user,
  'DB_PASSWORD' => $password
] = $_ENV;

$dsn = "mysql:dbname=$dbname;host=$host:$port;charset=$charset";

try {
  $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $ex) {
  echo "Erreur lors de la connexion à la base de données : " . $ex->getMessage();
  exit;
}

// Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates/');
$twig = new Environment($loader, [
  'debug' => $_ENV['APP_ENV'] === 'dev',
  'cache' => __DIR__ . '/../var/twig/',
]);

$api = new SpotifyWebAPI();
$session = new Session(
  '4ee7a6c88d74441294354b489a464bc2',
  '0c14e22c97cd49adb21cc48b1036075d',
);

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

$api = new SpotifyWebAPI();
$api->setAccessToken($accessToken);

$serviceContainer = new Container();
$serviceContainer
  ->set(Environment::class, $twig)
  ->set(PDO::class, $pdo)
  ->set(SpotifyWebAPI::class, $api);


// Appeler un routeur pour lui transférer la requête
$router = new Router($serviceContainer);
$router->registerRoutes();

try {
  $router->execute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (RouteNotFoundException $ex) {
  http_response_code(404);
}
