<?php

namespace App\Controller;

use App\Routing\Attribute\Route;
use PDO;
use Twig\Environment;

class IndexController extends AbstractController
{
  #[Route("/", name: "homepage")]
  public function home(): string
  {
    return $this->twig->render('index.html.twig');
  }

  #[Route("/addPlaylist", name: "addPlaylist")]
  public function addPlaylist(): string
  {
    $query = "SELECT * FROM musique";
    $result = $this->pdo->query($query);

    if ($result) {
      $row = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
      $errorInfo = $this->pdo->errorInfo();
      echo "Erreur lors de l'exécution de la requête SELECT : " . $errorInfo[2];
    }

    return $this->twig->render('index.html.twig', ['tableau' => $row]);
  }
  #[Route("/showMusic", name: "showMusic", httpMethod: "POST")]
  public function showMusic()
  {
    $textshearch = $_POST['textInput'];
    $results = $this->api->search($textshearch, 'track');
    return $this->twig->render('index.html.twig', ['listemusique' => $results]);
  }
}
