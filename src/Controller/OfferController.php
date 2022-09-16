<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;

use App\Manager\OfferManager;
use App\Entity\Offer;

class OfferController extends AbstractController {

    public function test(){
        $em = new OfferManager();

        // $offer = new Offer();
        // $offer->setTitle('Offre 4');
        // $offer->setDescription('Lorem Ipsum blablabla');
        // $offer->setLink('https://google.fr');
        // $em->add($offer);

        //$findFirst = $em->find(1);

        // $findFirst->setTitle('I AM THE STORM THAT IS APPROACHING');
        // $findFirst->setDescription('Lorem Ipsum blablabla');
        // $findFirst->setLink('https://google.fr');

        //$em->edit($findFirst);

        $find = $em->findAll();

        return $this->renderView('offer/index.php', ['offers' => $find]);
    }

}