<?php

namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Routing\Attribute\Route;
use App\Controller\PlaylistController;
use App\DependencyInjection\Container;
use App\Routing\RouteNotFoundException;
use App\Routing\Router;
use Symfony\Component\Dotenv\Dotenv;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

class IndexController extends AbstractController
{
  #[Route("/", name: "homepage")]
  public function home()
  {
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
        echo '<a href="/addPlaylist"><button>Add Playlist</button></a>';
      };
    }
  }
}
