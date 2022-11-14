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

    public function login() {
       $em = new UserManager();
       $flashMessage = new FlashMessage();

       if(isset($_POST) && !empty($_POST)){
           $user = $em->findOneBy(['email' => $_POST['email']]);
           if(password_verify($_POST['password'], $user->getPassword())){
               session_start();
               $_SESSION['email'] = $user->getEmail();
               $_SESSION['created_at'] = $user->getCreatedAt();

               return $this->redirectToRoute('user_profile');
           }else{
               $flashMessage->generateFlashMessage('AuthenticationErrorLogin', 'Error', 'Erreur lors de la connexion. L\'adresse email ou le mot de passe ne correrspondent pas');
           }

       }
       return $this->renderView('user/login.php');
    }

    public function userProfile() {
       return $this->renderView('user/profile.php');
    }

}