<?php

namespace App\Controller;

use PDO;
use PDOException;
use SpotifyWebAPI\SpotifyWebAPI;
use Twig\Environment;

abstract class AbstractController
{
  protected PDO $pdo;
  protected Environment $twig;
  protected SpotifyWebAPI $api;

  public function __construct(Environment $twig, SpotifyWebAPI $api)
  {
    $this->twig = $twig;
    $this->pdo = $this->connexion();
    $this->api = $api;
  }

  private function connexion()
  {
    // Connexion à la DB
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

    return $pdo;
  }
}
