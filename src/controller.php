<?php


declare(strict_types=1);

namespace App;



require_once("utils/debug.php");
require_once("view.php");
require_once("Database.php");
require_once("Model.php");




class Controller
{
    private static $configuration = [];

    private $database;
    private $model;
    private $request;
    private $view;
    private $logged;
    public $login;
    

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;

    }

    public function __construct(array $request)
    {
        $this->database = new Database(self::$configuration['db']);

        $this->request  = $request;
        $this->view     = new View();
        $this->model    = new Model();
      
    }

    public function run(): void
    { 

        $viewParams = []; 
        
        $test = false;

        $a = $this->action();

        if($a) {
          $this->$a();
        }        
    }

    public function b()
    {

    }

    public function registrationCompleted()
    {
      $this->view->list();
    }

    public function view_user()
    {
     $this->view_picture(); 
     $this->view->user();
    }

    public function view($data)

    {
      $this->view->$data();
    }

    public function save_login($data)
    {
      $this->login = $data;
     
    }

    public function logged($data)
    {
      $data = $this->logged;
    }

    private function action()
    {
        $data = $this->getRequestGet();
        return $data['action'] ?? $this->view->list();
    }

    private function getRequestGet(): array
    {
        return $this->request['get'] ?? [];
    }

    private function getRequestPost(): array
    {
        return $this->request['post'] ?? [];
    }

    public function creation(): void
    {
      if(empty($_SESSION['user'])) {
        $this->view->user();
      } else {
      $this->view->create();
      $id = 3;
      }
    }

    public function create(): void
    {
      $this->database->createNote();
      $id = 2;
    }

    public function login(): void
    {
      if(!empty($_SESSION['user']))
            {
              $this->view->user();
              $id      = 2;
            }
            else {
            $this->view->login();
            $id        = 1;
            }
    }

    public function adRepeatPassword(): void
    {
      $this->view->badRepeatPassword();
            $id        = 1;
    }

    public function passwordChange(): void
    {
      if(empty($_SESSION['user'])) {
        $this->view->list();
        $id   = 1;
      } else {
        $this->view->passwordChange();
        $id   = 4;
      }
    }
    
    public function changePasswordDatabase(array $data): void
    {

    $this->database->changePassword($data);
    }

    public function passwordChanged(): void
    {
      $this->model->changePassword();
    }

    public function logout(): void
    {
        session_destroy();
        // $data = false;
        // $data = $this->logged;
        $this->view->list_logout();
        
    }

    public function note_created(): void
    {
            $id = 2;
            $this->view->note_created();
    }

    public function checking_login(): void
    {
      $this->database->ver_user();
      
      $id = 3;
    }

    public function register(): void
    {
      if(!empty($_SESSION['user']))
            {
              $this->view->list();
              
            } else {
              $this->view->register();
               
            }    
    }

    public function createUser(): void
    {
            $this->model->createUser();
    }

    public function edit(): void
    {
        if(empty($_SESSION['user'])){
          $this->view->list();
        } else {
        $this->view_picture();  
        $page      = 'edit';
        $id        = 2;

        $user["login"] = $_SESSION['user'];

        $this->database->editNote($user);
    }
 
  }
    public function edition_title(): void
    {
        // $user['user'] = $_SESSION['user'];

        $this->database->editTitle();
    }

    public function action_view_edit_title(): void
    {
        $this->view->view_editTitle();
    }

    public function ready_edition_title(): void
    {
        // $title['title'] = $_POST['title'];
        $this->database->editionTitle();
    }

    public function edition_content(): void
    {
        $this->database->editContent();
    }

    public function action_view_edit_content(): void
    {
      $this->view->view_editContent();
    }

    public function ready_edition_content(): void
    {
        $this->database->editionContent();
    }

    public function delete(): void
    {
        $this->view_picture();
        $this->database->delete();
    }

    public function delete_note(): void
    {
        $data           = $this->getRequestGet();
        $note['id']     = $data['id'];
        

        $this->database->checkID($note);
       
         $login1 = $_SESSION['user2'];
         $login2 = $_SESSION['user'];
        
        if ($login1 == $login2) {
         $_SESSION['id'] = $data['id'];
        $this->database->deleteNote();
        }
        else 
        {
          $page = 'user';
          $id   = 2;
        }
    }

    public function edition(): void
    {
        // $data          = $this->getRequestGet();
        $this->model->checkID();
      //   $note['id']    = $_GET['id'];
      //   $note['login'] = $_SESSION['user'];

      //   $this->database->checkID();
      //   dump($_SESSION);
      //   $login1 = $_SESSION['user2'];
      //   $login2 = $_SESSION['user'];
        
      //   if($login1 == $login2)
      //   {         
      //   $_SESSION['id']    = $note['id'];
      //   require_once("./templates/pages/edition.php");
      // $page = 'edition';
      // $id   = 2;
      //   }
      //   else {
      //     $page = 'user';
      //     $id   = 2;
      //   }
    }

    public function checkID(): array
    {
      $this->database->checkID();

      $bang['test'] = "test"; // Randomowy zapis w celu cofnięcia się do wcześniejszej metody.
      return $bang;
    }

    public function editionView(): void
    {
      $this->view->editionView();
    }

    public function badRepeatPassword(): void
    {
      $this->view->badRepeatPassword();
    }

    public function createUserDatabase(array $data): void
    {
      $this->database->createUser($data);
    }

    public function settings()
    {
        $this->view->settings();
        // $this->view_picture();
        // $this->view_picture();
    }

    public function settings_after_add_photo()
    {
        $this->view->settings_after_add_photo();
    }

    public function view_picture()
    {
      $this->database->view_picture();
      $this->view->view_picture();
    }

    public function addProfilePicture()
    {
        $this->view->addProfilePicture();
    }

    public function additionProfilePicture()
    {
        $picture['picture'] = $_POST['urlProfilePicture'];

       $this->database->addProfilePicture($picture);
    }

    public function top5()
    {
      $this->database->top_5();
    }

    public function sorting()
    {
      $this->database->sorting_like();
    }


    // public function update_photo() //photo update after login
    // {
    //     $this->database->update_photo();
    // }
  }
