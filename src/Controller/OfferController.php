<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;

use App\Manager\OfferManager;

class OfferController extends AbstractController {

    public function test(){
        $em = new OfferManager();
        $find = $em->find(1);
        return $this->renderView('offer/index.php', ['offer' => $find]);
    }

}