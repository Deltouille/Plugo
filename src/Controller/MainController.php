<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;

class MainController extends AbstractController {
    
    public function home() {
        return $this->renderView('main/home.php', ['title' => 'Accueil']);
    }

    public function contact() {
        return $this->redirectToRoute('home', ['state' => 'success']);
    }

    public function mentionLegal() {
        return $this->renderView('main/mention_legales.php', ['title' => 'Mention Legales']);
    }

}

