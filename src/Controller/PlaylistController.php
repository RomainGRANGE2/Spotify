<?php

namespace App\Controller;

use App\Routing\Attribute\Route;

class PlaylistController extends AbstractController
{
  #[Route("/addPlaylist/{id}", name: "addPlaylist", httpMethod: "GET")]
  public function addPlaylist(string $id): string
  {
    return $this->twig->render('addPlaylist.html.twig', ['trackId' => $id]);
  }
}
