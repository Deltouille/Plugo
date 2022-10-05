<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use App\Entity\RDV;
use App\Manager\RDVManager;

class RDVController extends AbstractController {

    public function accueil() {
        $em = new RDVManager();
        $allRDV = $em->findAll();
        return $this->renderView('rdv/index.php', ['allRDV' => $allRDV]);
    }

    public function addRdv() {
        if(isset($_POST) && !empty($_POST)){
            $em = new RDVManager();
            $new = new RDV();
            
            $new->setTitle($_POST['title']);
            $new->setDetails($_POST['details']);
            $new->setDate(str_replace("T", " ", $_POST['date']));
            $new->setImportant(isset($_POST['important']) ? 1 : 0);

            $em->add($new);
            return $this->redirectToRoute('all_rdv');
        }
        
        return $this->renderView('rdv/add.php');
    }

    public function remove() {
        $em = new RDVManager();
        $dataToRemove = $em->find(['id' => $_GET['id']]);
        $em->remove($dataToRemove);

        return $this->redirectToRoute('all_rdv');
    }

    public function details() {
        $em = new RDVManager();
        $details = $em->find(['id' => $_GET['id']]);
        return $this->renderView('rdv/details.php', ['details' => $details]);
    }

    public function update() {
        $em = new RDVManager();
        if(isset($_POST) && !empty($_POST)){
            $toUpdate = $em->find(['id' => $_POST['id']]);

            $toUpdate->setTitle($_POST['title']);
            $toUpdate->setDetails($_POST['details']);
            $toUpdate->setDate(str_replace("T", " ",$_POST['date']));
            $toUpdate->setImportant(isset($_POST['important']) ? true : '0');

            $em->edit($toUpdate);

            return $this->redirectToRoute('all_rdv');
        }
        $rdv = $em->find(['id' => $_GET['id']]);
        return $this->renderView('rdv/update.php', ['rdv' => $rdv, 'ID' => $_GET['id']]);
    }

}