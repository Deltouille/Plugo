<?php 

namespace App\Manager;

use Plugo\Manager\AbstractManager;
use App\Entity\Article;

class ArticleManager extends AbstractManager {
    
    public function find(int $id) {
        return $this->readOne(Article::class, $id);
    }

    public function findAll() {
        return $this->readMany(Article::class);
    }

    public function add(Article $article) {
        return $this->create(Article::class, [
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'content' => $article->getContent(),
        ]);
    }

    public function add(Article $article) {
        return $this->update(Article::class, [
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'content' => $article->getContent(),
        ],
        $article->getId());
    }

    public function remove(Article $article) {
        return $this->delete(Article::class, $article->getId());
    }

}