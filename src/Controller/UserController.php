<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use App\Entity\User;
use App\Manager\UserManager;

class UserController extends AbstractController {
    
    public function register() {
        $message = '';
        if(isset($_POST) && !empty($_POST)){
            if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST['email']) == 0){
               $message = 'L\'email n\'est pas valide';
               return $this->renderView('user/register.php', ['message' => $message]);
            }

            if(strcmp($_POST['password'], $_POST['passwordVerif']) != 0){
               $message = "Les mots de passe ne correspondent pas";
               return $this->renderView('user/register.php', ['message' => $message]);
            }

            $em = new UserManager();
            if(empty($em->findOneBy(['email' => $_POST['email']]))){
               $message = "Compte créer !";
               
               $user = new User();
               $user->setEmail($_POST['email']);
               $user->setPassword($_POST['password']);
               $user->setCreatedAt(date('Y-m-d H:i:s'));
               $user->setUpdatedAt(null);

               $em->add($user);

               return $this->renderView('user/register.php', ['message' => $message]);

            }else{
               $message = "l'utilisateur existe déjà";
               return $this->renderView('user/register.php', ['message' => $message]);
            }

        }
        return $this->renderView('user/register.php', ['message' => $message]);
    }

}