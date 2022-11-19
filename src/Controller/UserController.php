<?php

namespace App\Controller;

use http\Env\Response;
use Plugo\Controller\AbstractController;
use App\Entity\User;
use App\Manager\UserManager;

use Plugo\Services\Auth\CheckCredentials;
use Plugo\Services\FlashMessage\FlashMessage;
use Plugo\Services\Auth\Authenticator;

class UserController extends AbstractController {

    public function __construct(){
        $this->flashMessage = new FlashMessage();
        $this->checkCredentials = new CheckCredentials();
    }

    public function userRegister() {
        $checkCredentials = new CheckCredentials();
        $em = new UserManager();

        $this->flashMessage->clearFlashMessage();

        if(isset($_POST) && !empty($_POST)){

            $isError = false;

            if(!$checkCredentials->checkEmail($_POST['email'])){
                $isError = true;
            }

            if(!$checkCredentials->checkPassword($_POST['password'], $_POST['passwordVerif'])){
                $isError = true;
            }

            if(!$isError){
                if(empty($em->findOneBy(['email' => $_POST['email']]))){
                    $user = new User();
                    $user->setEmail($_POST['email']);
                    $user->setPassword($_POST['password']);
                    $user->setCreatedAt(date('Y-m-d H:i:s'));
                    $user->setUpdatedAt(null);
                    $em->add($user);
                    $this->flashMessage->generateFlashMessage('AuthenticationSuccess', 'Success', 'Le compte a bien été créé !');
                }else{
                    $this->flashMessage->generateFlashMessage('AuthenticationErrorInscription', 'Error', 'Un compte existe déjà avec cette adresse email');
                }
            }
        }
        return $this->renderView('user/register.php');
    }

    public function userLogin() {
        if(isset($_POST) && !empty($_POST)){
            $authenticator = new Authenticator();
            $result = $authenticator->login($_POST);
            if($result){
                return $this->redirectToRoute('user_profile');
            }else{
                $this->flashMessage->generateFlashMessage('AuthenticationErrorLogin', 'Error', 'Erreur lors de la connexion. L\'adresse email ou le mot de passe ne correrspondent pas');
            }
        }

        return $this->renderView('user/login.php');
    }

    public function userProfile() {
        return $this->renderView('user/profile.php');
    }

    public function userLogout() {
        $authenticator = new Authenticator();
        $authenticator->logout();

       return $this->redirectToRoute('user_login');
    }

}