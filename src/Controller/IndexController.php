<?php

namespace App\Controller;

use App\Routing\Attribute\Route;

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
    return $this->twig->render('addPlaylist.html.twig');
  }
}
