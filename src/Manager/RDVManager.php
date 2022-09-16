<?php

namespace App\Manager;

use App\Entity\RDV;
use Plugo\Manager\AbstractManager;

class RDVManager extends AbstractManager {

    public function find(int $id) {
        return $this->readOne(RDV::class, $id);
    }

    public function findAll() {
        return $this->readMany(RDV::class);
    }

    public function add(RDV $rdv) {
        return $this->create(RDV::class, [
            'title' => $rdv->getTitle(),
            'details' => $rdv->getDetails(),
            'date' => $rdv->getDate(),
            'important' => $rdv->getImportant(),
        ]);
    }

    public function edit(RDV $rdv) {
        return $this->update(RDV::class, [
            'title' => $rdv->getTitle(),
            'details' => $rdv->getDetails(),
            'date' => $rdv->getDate(),
            'important' => $rdv->getImportant(),
        ],
        $rdv->getId());
    }

    public function remove(RDV $rdv) {
        return $this->delete(RDV::class, $rdv->getId());
    }
}