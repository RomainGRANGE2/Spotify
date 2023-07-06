<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Initialisation de certaines choses
use App\Controller\ContactController;
use App\Controller\IndexController;
use App\DependencyInjection\Container;
use App\Routing\RouteNotFoundException;
use App\Routing\Router;
use Symfony\Component\Dotenv\Dotenv;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

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

$serviceContainer = new Container();
$serviceContainer
  ->set(Environment::class, $twig)
  ->set(PDO::class, $pdo);

// Appeler un routeur pour lui transférer la requête
$router = new Router($serviceContainer);
$router->registerRoutes();

try {
  $router->execute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (RouteNotFoundException $ex) {
  http_response_code(404);
}

$session = new SpotifyWebAPI\Session(
  '4ee7a6c88d74441294354b489a464bc2',
  '0c14e22c97cd49adb21cc48b1036075d',
);

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);


echo '<form method="get">';
echo '<input type="text" name="textInput"/>';
echo '<input type="submit" name="submitInput"/><br>';
echo '</form>';

if (isset($_GET['submitInput'])) {
  $text = $_GET['textInput'];
  if ($text == '') {
    return;
  }
  $results = $api->search($text, 'track');

  foreach ($results->tracks->items as $artist) {
    echo $artist->name, '  ', $artist->artists[0]->name, '<br>';
    echo '<img src="' . $artist->album->images[2]->url . '"><br>';
    echo '<a href="playlist?idtrack=' . $artist->id . '"><button>Add Playlist</button></a>';
  };
}
