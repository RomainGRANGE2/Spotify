<?php

namespace App\Controller;

use App\Routing\Attribute\Route;

class PlaylistController extends AbstractController
{
  #[Route("/addPlaylist", name: "addPlaylist", httpMethod: "GET")]
  public function addPlaylist(): string
  {
    return $this->twig->render('addPlaylist.html.twig');
  }
}
