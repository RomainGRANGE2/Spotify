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

  #[Route("/showMusic", name: "showMusic", httpMethod: "POST")]
  public function showMusic()
  {
    $textshearch = $_POST['textInput'];
    $results = $this->api->search($textshearch, 'track');
    return $this->twig->render('index.html.twig', ['listemusique' => $results]);
  }
}
