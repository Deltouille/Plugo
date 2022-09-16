<?php 

namespace App\Manager;

use Plugo\Manager\AbstractManager;
use App\Entity\Article;

class ArticleManager extends AbstractManager {
    
    public function find(int $id) {
        return $this->readOne(Offer::class, $id);
    }

    public function findAll() {
        return $this->readMany(Offer::class);
    }

    public function add(Offer $offer) {
        return $this->create(Offer::class, [
            'title' => $offer->getTitle(),
            'description' => $offer->getDescription(),
            'link' => $offer->getLink(),
        ]);
    }

    public function update(Offer $offer) {
        return $this->update(Offer::class, [
            'title' => $offer->getTitle(),
            'description' => $offer->getDescription(),
            'link' => $offer->getLink(),
        ],
        $offer->getId());
    }

    public function remove(Offer $offer) {
        return $this->delete(Offer::class, $offer->getId());
    }

}