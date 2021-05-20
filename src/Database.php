<?php

declare(strict_types=1);

namespace App;
use mysqli;
use mysqli_sql_exception;

define("MYSQL_CONN_ERROR", "Unable to connect to database.");
require_once("controller.php");
require_once("session.php");
require_once("view.php");


class Database
{
    private $dsn;
    private $controller;
    public $login;   

    public function __construct(array $config)
    {
        $this->validateConfig($config);
        $this->createConnection($config);
        
    }

    public function createNote(): void
    {
       
        $login   = $_SESSION['user'];
        $name    = $_POST['name'];
        $content = $_POST['content'];

       $query = mysqli_query($this->dsn, "INSERT INTO notes (login, name, content) VALUES ('$login', '$name', '$content')");
      
       $result = mysqli_query($this->dsn, 'SELECT * FROM notes');
       $row    = mysqli_fetch_assoc($result);
       
       $request['get']['action'] = "note_created";
       
       $user = new Controller($request);
       $user->run($request);

    }

    public function editNote(array $data): void
    {
        $login   = $data['login'];
        (int) $id      = 0;
        $name    = ['name'];
        $content = 
        ['content'];
        $user = $_SESSION['user'];

        for ($int = 1; $int < 1000; $int++) {
            $query  = mysqli_query($this->dsn,
            "SELECT *
             FROM notes
             WHERE id = $int
             ");
        $row    = mysqli_fetch_assoc($query);
        
        
        if($row['login'] == $login)
        {
            $name['name']       = $row['name'];
            $content['content'] = $row['content'];
            (int) $id                 = $row['id'];
            
            echo " </b>";
            echo "<b>Tytuł notatki: </b>";
            echo htmlentities($name['name']);
            echo "<td>
                 <a href='/?action=edition&id=$id'>Edytuj</a>
            </td>";
            
            echo "<br>";   
        }
        

        }

        echo "<a href='/?action=view_user'>Powrót</a>";
    }
    
    public function editContent(): void
    {
      (int) $id                 = $_SESSION['id'];

      $query_content            = mysqli_query($this->dsn, "SELECT * FROM notes WHERE id = '$id' ");
      $result                   = mysqli_fetch_assoc($query_content);
      $_SESSION['content']      = $result['content'];

      $request['get']['action'] = 'action_view_edit_content';

      $data                     = new Controller($request);
      $data                     -> run();
    //   echo "<div> 
    //   <h3>Zmiana treści notatki:</h3>
    //   <div>
    //   <form class='note-form' action='/?action=ready_edition_content' method='post'>
    //   <ul>
      
    //   Treść: <div id='content'>
    //   <input type=text name='content' value='$content'>
    //   </div>
    //   <div id='content_edit_submit'>
    //   <a href='ready_edition_content.php'><input type=submit value='Edytuj'>
    //   </ul>
    //   </form>

       

   }

public function editionContent(): void
{
    $content  = $_POST['content'];
    (int) $id = $_SESSION['id'];
    
    $query = mysqli_query($this->dsn,
    " UPDATE notes
      SET content = '$content'
      WHERE id    = '$id' 
    
    ");

    $query_content  = mysqli_query($this->dsn, "SELECT * FROM notes WHERE id = '$id' ");
    
    $result = mysqli_fetch_assoc($query_content);
    echo "Edycja notatki przeszła pomyślnie.";

    $request['get']['action'] = 'edit';

    $data                     = new Controller($request);
    $data                     -> run();
}

public function editTitle(): void
{
    dump($_SESSION);
    (int) $id          = $_SESSION['id'];

    $query_title       = mysqli_query($this->dsn, "SELECT * FROM notes WHERE id = '$id'");
    $result            = mysqli_fetch_assoc($query_title);
    $_SESSION['title'] = $result['name'];

    $request['get']['action'] = "action_view_edit_title";
       
       $user = new Controller($request);
       $user->run($request);
    // echo "<div> 
    // <h3>Zmiana treści notatki:</h3>
    // <div>
    // <form class='note-form' action='/?action=ready_edition_title' method='post'>
    // <ul>
    
    // Treść: <div id='content'>
    // <input type=text name='title' value='$title'>
    // </div>
    // <div id='content_edit_submit'>
    // <a href='ready_edition_title.php'><input type=submit value='Edytuj'>
    // </ul>
    // </form>";
    
}

public function editionTitle(): void
{
    (int) $id    = $_SESSION['id'];
    $title       = $_POST['title'];
    $query = mysqli_query($this->dsn, 
    " UPDATE notes 
      SET    name = '$title'
      WHERE id    = '$id'
    ");


    $query_title = mysqli_query($this->dsn, "SELECT * FROM notes WHERE id = '$id'");
    $result      = mysqli_fetch_assoc($query_title);
    echo "Edycja notatki przeszła pomyślnie.";

    $request['get']['action'] = 'edit';
    $data                     = new Controller($request);
    $data                     -> run();
}


    public function checkID(): array
    {
        $id            = $_GET['id'];
        $note['login'] = $_SESSION['user'];

        $query_check = mysqli_query($this->dsn, "SELECT * FROM notes WHERE id = '$id'");
        $result      = mysqli_fetch_assoc($query_check);
        
        $bang['login']     = $result['login'];
        $_SESSION['user2'] = $bang['login'];
        return $bang;
    }
    
    public function ver_user(): void
    {
         if(empty($_POST)) {
            $request['get']['action'] = 'user';
            $data                     = new Controller($request);
            $data                     -> run();
          } else {
     
       $login    = $_POST["login"];
       $password = $_POST["register"]; 

       $boombap  = $this->dsn->real_escape_string($login);

       $boombap2 = $this->dsn->real_escape_string($password);

       $query_login     = mysqli_query($this->dsn, "SELECT * FROM user WHERE login    ='$boombap'");
 
       $result_login     = mysqli_fetch_assoc($query_login); 
       
       $query_password     = mysqli_query($this->dsn, "SELECT * FROM user WHERE password    ='$boombap2'");
       $result_password = mysqli_fetch_assoc($query_password);

       (int) $id  = mysqli_insert_id($this->dsn);

       if(empty($result_login) || empty($result_password)) {
          
          $request['get']['action'] = "badRepeatPassword";
          $request['post']['id']     = 1;

          $user = new Controller($request);
          $user->run($request);
       }
       else {
          
        $request = [ 
            'get'  => $_GET,
            'post' => $_POST
        ];
        $this->login = $login;
       
        $request['get']['action'] = "view_user";
        // $request['post']['id']    = 1;
        // $request['get']['login'] = $login;
        $_SESSION['user'] = $login;
        
        $login2 = $login;
        $user = "user";

        $logged                   = true;
        $user_name                = $login;
          $user = new Controller($request);
          $user -> run();
        //   $user -> view($user);
        //   $user->run($request);
        //   $user->logged($logged);
        //   $user->save_login($user_name);
          
       }
    }
 }

    public function createUser(array $data): void
    {
        $login    = $data["login"];
        $password = $data["password"];
    
        $query_login     = mysqli_query($this->dsn, "SELECT * FROM user WHERE login    ='$login'");
        $result          = mysqli_fetch_assoc($query_login);


        if (empty($result)) {
        $query = mysqli_query($this->dsn, "INSERT INTO user (login, password) VALUES ('$login', '$password')");
        $this->photo_after_registration($data);
        echo "Rejestracja przeszła pomyślnie, możesz się zalogować. ;)";
        }
        else {
            echo "Podana przez Ciebie nazwa użytkownika już istnieje";
        }
        $request['get']['action'] = 'registrationCompleted';
        $data = new Controller($request);
        $data ->run();
    }

    public function delete(): void
    {
        $login   = $_SESSION['user'];
        (int) $id      = 0;
        $name    = ['name'];

        for ($int = 1; $int < 1000; $int++) {
            $query  = mysqli_query($this->dsn,
            "SELECT *
             FROM notes
             WHERE id = '$int';
             ");
        $row    = mysqli_fetch_assoc($query);
            
        if($row['login'] == $login)
        {
            $name['name']       = $row['name'];
            $id                 = $row['id'];

            echo " </b>";
            echo "<b>Tytuł notatki: </b>";
            echo htmlentities($name['name']);
            echo "<td>
                 <a href='/?action=delete_note&id=$id'>Usuń</a>
            </td>";
            
            echo "<br>";   
        }

        }
        echo "<a href='/?action=view_user'>Powrót</a>";

    }

    public function deleteNote(): void
    {
        (int) $id = $_SESSION['id'];

        $query = mysqli_query($this->dsn, 
        "DELETE FROM notes
        WHERE id = '$id' 
        ");

       echo "Notatka została pomyślnie usunięta.";
    }

    // public function settings(): void
    // {
    //     echo "Settings";
    //     $login = $_SESSION['user'];

    //     $query = mysqli_query($this->dsn, 
    //     ""
    // );

    

    public function changePassword(array $data): void
    {
        

        // if (empty($changepassword['change_password1'] 
        //             & $changepassword['change_password2']
        //             & $changepassword['new_change_password1']
        //             & $changepassword['new_change_password2'])) {
        //               $this->view->user();
        //               $id   = 2;
        //             }
        //      else {       

        //      if($changepassword['change_password1'] == $changepassword['change_password2'])
        //      {
        //        if($changepassword['new_change_password1'] == $changepassword['new_change_password2']) {
        //          $this->database->changePassword();
        //        }
        //        else {
        //          echo "Nowe hasła nie są takie same";
        //          $this->view->passwordChange();
        //        }
        //      }
        //      else {
        //        echo "Twoje drugie hasło się różni od pierwszego";
        //        $this->view->passwordChange();
        //      }        

        $login       = $_SESSION['user'];
        $password    = $data["change_password1"] ?? []; 
        $newpassword = $data["new_change_password1"];
 
        $boombap  = $this->dsn->real_escape_string($login);
 
        $boombap2 = $this->dsn->real_escape_string($password);
 
        $query_login     = mysqli_query($this->dsn, "SELECT * FROM user WHERE login    ='$boombap'");

        $result_login     = mysqli_fetch_assoc($query_login); 
        
        $query_password     = mysqli_query($this->dsn, "SELECT * FROM user WHERE password    ='$boombap2'");
        $result_password = mysqli_fetch_assoc($query_password);
 
        (int) $id  = mysqli_insert_id($this->dsn);
        

        if(empty($result_login) || empty($result_password)) {
          echo "Złe hasło";
         }
         else {
            dump($boombap);
            dump($newpassword);
            echo "Hasło zmienione";
          $query = mysqli_query($this->dsn,
          " UPDATE user 
            SET password = '$newpassword'
            WHERE login = '$boombap'");
        
         }     
   
    }
   
    public function photo_after_registration(array $data): void
    {
        dump($data);
        $login = $data['login'];
        $photo = "https://i.pinimg.com/originals/f2/d2/f7/f2d2f7370e0dde93e9b71b7f68561ffa.jpg";

        $query_photo = mysqli_query($this->dsn, "INSERT INTO profilepicture (login, url) VALUES ('$login', '$photo')");
    }

    public function addProfilePicture(array $data): void
    {
        $picture = $data['picture'];
        $login   = $_SESSION['user'];
        
        // (int) $id    = $_SESSION['id'];
        // $title       = $_POST['title'];
        // $query = mysqli_query($this->dsn, 
        // " UPDATE notes 
        //   SET    name = '$title'
        //   WHERE id    = '$id'
        // ");
     
        $query_picture   = mysqli_query($this->dsn, "UPDATE profilepicture SET url = '$picture' WHERE login = '$login'");
        
        echo "Zdjęcie zostało pomyślnie dodane ;)";

        $request['get']['action'] = 'settings_after_add_photo';
        $data                     = new Controller($request);
        $data                     ->run();       
    }

    public function view_picture()
    {
        echo "<br></br>";
        $login       = $_SESSION['user'];

        $query_view  = mysqli_query($this->dsn, "SELECT * FROM profilepicture WHERE login = '$login' ");
        $result_view = mysqli_fetch_assoc($query_view);

        $_SESSION['picture'] = $result_view['url'];
    }

    public function top_5()
    {
            $id = 0;

            for($i=1; $i <= 5; $i++) {
            $query_top   = mysqli_query($this->dsn, "SELECT content FROM notes LIMIT $id,5");
            $result_view = mysqli_fetch_assoc($query_top);
            dump($result_view);
            $id++;
            };

    }
    
    public function sorting_like()
    {
        // SELECT * FROM `notes` ORDER BY `notes`.`like` ASC
       $query_sort = mysqli_query(
           $this->dsn, "SELECT like FROM notes ORDER BY like ASC");
       $result_view = mysqli_fetch_assoc($query_sort);
       dump($result_view);
       $id = 0;

       for($i=1; $i <= 5; $i++) {
       $query_top   = mysqli_query($this->dsn, "SELECT content FROM notes LIMIT $id,5");
       $result_view = mysqli_fetch_assoc($query_top);
       dump($result_view);
       $id++;
       };
    }
    

    private function createConnection(array $config): void
    {
        try {
        mysqli_connect ($config['host'], $config['user'], $config['password'], $config['database']);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->dsn = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);
        } catch (mysqli_sql_exception $e) {
            dump($e->getMessage());
            exit(0);
        }
    }

    private function validateConfig(array $config): void
    {
        if (
            empty($config['database'])
            || empty($config['host'])
            || empty($config['user'])

        ) {
            echo "error connect to database";
        }
    }

}

