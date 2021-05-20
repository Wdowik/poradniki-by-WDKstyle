<?php

// declare(strict_types=1);

// namespace App;

// require_once("utils/debug.php");
// require_once("Database.php");
// require_once("view.php");


// class ControllerUser {

//     private const DEFAULT_ACTION = 'list';
//     private static $configuration = [];

    
//     private $database;
//     private $request;
//     private $view;
//     private $logged;
//     public $login;


//     public static function initConfiguration(array $configuration): void
//     {
//         self::$configuration = $configuration;
//     }

//     public function __construct(array $request)
//     {
//       $this->database = new Database(self::$configuration['db']);
//       $this->request  = $request;
//       $this->view     = new View();
//     }

//     public function run(): void
//     {
//        $viewParams = [];

//        echo "Znajdujemy się w ControllerUser.";
//        switch($this->action()) {
//            case 'login':
//             echo "Loogin";
//             if(!empty($_SESSION['user']))
//             {
//               $page    = 'user';
//               $id      = 2;
//             }
//             else {
//             $page      = 'login';
//             $id        = 1;
//             }
//            break;
//            case 'checking_login':
//             if(empty($_POST)) {
//                 $page = 'list';
//                 $id   = 1;
//               } else {
//               $user["login"]    = $_POST["login"];
//               $user["password"] = $_POST["register"];
//               $page             = 'search';
              
              
//               $this->database->ver_user($user);
              
//               $id = 3;
//               }
//               break;
//               case 'badRepeatPassword':
//                $page      = 'badRepeatPassword';
//                $id        = 1;
//               break;
//               case 'user':
//                 if(empty($_SESSION['user'])) {
//                  $page = 'list';
//                  $id   = 1;
//                 } else {
//                  $page      = 'user';
//                  $id        = 2;
//                 }
//                break;
               
//     }
//     dump($page);
//     $this->view->render($page, $viewParams, $id);
    
// }

// public function save_login($data)
// {
//   $this->login = $data;
 
// }

// public function logged($data)
// {
//   $data = $this->logged;
// }

//     private function action(): string
//     {
//         $data = $this->getRequestGet();
//         return $data['actionUser'] ?? self::DEFAULT_ACTION;
//     }
     
//     private function getRequestGet(): array
//     {
//         return $this->request['get'] ?? [];
//     } 

//     private function getRequestPost(): array
//     {
//         return $this->request['post'] ?? [];
//     }

// }