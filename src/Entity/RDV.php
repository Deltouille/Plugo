<?php

namespace App\Entity;

class RDV {
    private ?int $id;
    private ?string $title;
    private ?string $details;
    private $date;
    private ?int $important;

    public function getId(){
        return $this->id;
    }

    public function setId(?int $id){
        $this->id = $id; 
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle(?string $title){
        $this->title = $title; 
    }

    public function getDetails(){
        return $this->details;
    }

    public function setDetails(?string $details){
        $this->details = $details; 
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date; 
    }

    public function getImportant(){
        return $this->important;
    }

    public function setImportant(?int $important){
        $this->important = $important; 
    }

    

}