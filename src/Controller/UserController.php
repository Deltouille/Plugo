<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use App\Entity\User;
use App\Manager\UserManager;

use App\Service\CheckCredentials;
use App\Service\FlashMessage;

class UserController extends AbstractController {
    
   public function register() {
      $flashMessage = new FlashMessage();
      $checkCredentials = new CheckCredentials();
      $em = new UserManager();

      $flashMessage->clearFlashMessage();

      if(isset($_POST) && !empty($_POST)){

         $IsError = false;

         if(!$checkCredentials->checkEmail($_POST['email'])){
            $IsError = true;
         }

         if(!$checkCredentials->checkPassword($_POST['password'], $_POST['passwordVerif'])){
            $IsError = true;
         }

         if($IsError == false){
            if(empty($em->findOneBy(['email' => $_POST['email']]))){

               $user = new User();

               $user->setEmail($_POST['email']);
               $user->setPassword($_POST['password']);
               $user->setCreatedAt(date('Y-m-d H:i:s'));
               $user->setUpdatedAt(null);

               $em->add($user);

               $flashMessage->generateFlashMessage('AuthenticationSuccess', 'Success', 'Le compte a bien été créé !');

            }else{
               $flashMessage->generateFlashMessage('AuthenticationErrorInscription', 'Error', 'Un compte existe déjà avec cette adresse email');
            }
         }
      }
      return $this->renderView('user/register.php');
    }

}