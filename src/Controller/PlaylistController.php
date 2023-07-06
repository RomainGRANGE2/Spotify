<?php

namespace App\Controller;

use App\Routing\Attribute\Route;

class PlaylistController
{
  #[Route("/addPlaylist", name: "addPlaylist")]
  public function addPlaylist()
  {
    echo "lalalalal";
  }
}
