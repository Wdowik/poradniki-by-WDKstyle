<?php

declare(strict_types=1);

namespace App;

require_once("utils/debug.php");
require_once("controller.php");
require_once("view.php");

class Model 
{   

  public function changePassword(): void
  {
        $changepassword['change_password1']     = $_POST['change_password1'] ?? [];
        $changepassword['change_password2']     = $_POST['change_password2'] ?? [];
        $changepassword['new_change_password1'] = $_POST['new_change_password1'] ?? [];
        $changepassword['new_change_password2'] = $_POST['new_change_password2'] ?? [];

    if (empty($changepassword['change_password1'] 
                    & $changepassword['change_password2']
                    & $changepassword['new_change_password1']
                    & $changepassword['new_change_password2'])) {
                      $this->view->user();
                      $id   = 2;
                    }
             else {       

             if($changepassword['change_password1'] == $changepassword['change_password2'])
             {
               if($changepassword['new_change_password1'] == $changepassword['new_change_password2']) {
                 $this->controller->changePasswordDatabase($changepassword);
               }
               else {
                 echo "Nowe hasła nie są takie same";
                 $this->view->passwordChange();
               }
             }
             else {
               echo "Twoje drugie hasło się różni od pierwszego";
               $this->view->passwordChange();
             }
             $page = 'changePassword';
             $id   = 4;
            }
  }

  public function createUser(): void
  {
    $user["login"]          = $_POST["createLogin"];
    $user["password"]       = $_POST["createPassword"];
    $user["repeatPassword"] = $_POST["repeatPassword"];

    if ($user["password"] == $_POST["repeatPassword"])
    {

      $request['get']['action'] = 'b';
      $data = new Controller($request);
      $data ->createUserDatabase($user);
    }
    else 
    {
      $request['get']['action'] = 'badRepeatPassword';
      $data = new Controller($request);
    }
  }

  public function checkID(): void
  {
        $note['id']    = $_GET['id'];
        $note['login'] = $_SESSION['user'];

        $request['get']['action'] = "checkID";
        $data                     = new Controller($request);
        $data                     -> run();
        
        unset($data);
        
        $login1 = $_SESSION['user2'];
        $login2 = $_SESSION['user'];
        
        if($login1 == $login2)
        {         
        $_SESSION['id']    = $note['id'];
        $request['get']['action'] = "editionView";
        }
        else {
          $request['get']['action'] = "edit";
        }

        $data                     = new Controller($request);
        $data                     -> run();
  }
   
}