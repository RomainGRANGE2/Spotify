<?php

namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Routing\Attribute\Route;
use App\Controller\PlaylistController;
use App\DependencyInjection\Container;
use App\Routing\RouteNotFoundException;
use App\Routing\Router;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use Symfony\Component\Dotenv\Dotenv;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Model\User;
use App\Routing\Attribute\Authorize;
use PDO;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

class IndexController extends AbstractController
{


  #[Route("/", name: "homepage")]
  public function home()
  {

    echo '<form method="get">';
    echo '<input type="text" name="textInput"/>';
    echo '<input type="submit" name="submitInput"/><br>';
    echo '</form>';

    if (isset($_GET['submitInput'])) {
      $text = $_GET['textInput'];
      if ($text == '') {
        return;
      }
      $results = $this->api->search($text, 'track');

      foreach ($results->tracks->items as $artist) {
        echo $artist->name, '  ', $artist->artists[0]->name, '<br>';
        echo '<img src="' . $artist->album->images[2]->url . '"><br>';
        echo '<a href="/addPlaylist"><button>Add Playlist</button></a>';
      };
    }
  }
}
