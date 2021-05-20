<?php

declare(strict_types=1);

namespace App;

require_once("./src/utils/debug.php");

class View
{
    public function render($params, $id): void
    {
        if ($id==1) {
            require_once("templates/layout.php"); }

        if ($id==2) {
            require_once("templates/pages/layout_user.php");
            
        }    

        if ($id==3) {
           
        }

        if ($id==4) {
            require_once("templates/pages/settings.php");
        }
    }

    public function render_two($page, $params): void
    {
        require_once("templates/layout.php");
    }

    public function login(): void
    {
        echo "<div>
         <h3> Logowanie </h3>
         <div>
           <form class='note-form' action='/?action=checking_login' method='post'>
             <ul>
               
                 Login: <div id='login'>
                  <input type=text name='login'/><br/>
                 </div>
                 Hasło: <div id='password'>
                  <input type=password name='register'/><br/>
                 </div>
                 <div id='user_data'>
                  <a href='checking_login.php'><input type=submit value='Zaloguj'/></a>
                 </div>
             </ul>
           </form>
           <a href='/'>Powrót</a>
       
         </div>
       </div>";
    }

    public function user(): void
    {
      // if(empty($_SESSION['user'])) {
      //   $list = "list";
      //   $request = [ 
      //     'get'  => $_GET,
      //     'post' => $_POST
      // ];
      //   $controller = new Controller($request);
      //   $controller->view($list);
      //  } else {
        // $this->view_picture();        
      echo " </div>

      <div class='container'>
       <div class='menu'>
        <ul>
         <li><a href='/?action=creation'>Nowa notatka</a></li>
         <li><a href='/?action=edit'  >Edytuj notatkę</a></li>
         <li><a href='/?action=delete'>Usuń notatkę</a></li>
         <li><a href='/?action=settings'>Ustawienia konta</a></li>
         <li><a href='/?action=logout'>Wyloguj</a></li>
         <li><a href='/?action=sorting'>Sortowanie</a></li>
         <li><a href='/?action=top5'>TOP5</a></li>
         
         (Top 5 poradników)
         <br></br>
         (ABCDEFGHIJKLMNO... WYSZUKIWARKA PORADNIKA WEDŁUG WYBRANIA PIERWSZEJ LITERY)
         <br></br>
         (wYSZUKIWARKA POPRZEZ WPISANIE FRAZY)
        </ul>
        </ul>
        
        </div>
      
     
       <div class='footer'>
       <p>Poradniki.pl - by WDK</p>   
     </body>";
      //  }
    }
    public function list(): void
    {
      if(!empty($_SESSION['user'])) {
        
        $this->user();

       } else {
        echo "<html lang='pl'>

        <head>
         <title>Notatnik</title>
         <meta charset='utf-8'>
         <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
         <link href='/public/style.css' rel='stylesheet'>
        </head>
        
        <body class='body'>
         <div class='wrapper'>
         <div class='header'>
          <h1><i class='far fa-clipboard'></i>Poradniki
          </h1>
         </div>
        
         <div class='container'>
          <div class='menu'>
           <ul>
            <li><a href='/''>Strona główna</a></li>
            <li><a href='/?action=login'>Logowanie</a></li>
            <li><a href='/?action=register'>Rejestracja</a></li>
            (Top 5 poradników)
            <br></br>
            <form class='note-form' action='/?action=search_ABC' method='post'>
            </form>
            
            <br></br>
            
        
            <form class='note-form' action='/?action=search' method='post'>
            <div id='search'>
              Wyszukaj: <input type=text name='search'></br> 
            </div>
            <div id='send_button'>
                        <a href='search.php'><input type=submit value='Szukaj'/></a>
            </div>
            </form>
           </ul>
           
          
        
          <div class='footer'>
          <p>Poradniki.pl - by WDK</p>
          </div>   
        </body>
        </html>";
      }
      
    }

    public function list_logout(): void
    {
      // if(!empty($_SESSION['user'])) {
        
      //   $this->user();

      //  } else {
        echo "<html lang='pl'>

        <head>
         <title>Notatnik</title>
         <meta charset='utf-8'>
         <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
         <link href='/public/style.css' rel='stylesheet'>
        </head>
        
        <body class='body'>
         <div class='wrapper'>
         <div class='header'>
          <h1><i class='far fa-clipboard'></i>Poradniki
          </h1>
         </div>
        
         <div class='container'>
          <div class='menu'>
           <ul>
            <li><a href='/''>Strona główna</a></li>
            <li><a href='/?action=login'>Logowanie</a></li>
            <li><a href='/?action=register'>Rejestracja</a></li>
            (Top 5 poradników)
            <br></br>
            <form class='note-form' action='/?action=search_ABC' method='post'>
            </form>
            
            <br></br>
            
        
            <form class='note-form' action='/?action=search' method='post'>
            <div id='search'>
              Wyszukaj: <input type=text name='search'></br> 
            </div>
            <div id='send_button'>
                        <a href='search.php'><input type=submit value='Szukaj'/></a>
            </div>
            </form>
           </ul>
           
          
        
          <div class='footer'>
          <p>Poradniki.pl - by WDK</p>
          </div>   
        </body>
        </html>";
      //  }
      
    }

    public function create(): void
    {
      $this->view_picture();  

        echo "<div>
        <h3> Dodaj poradnik </h3>
        <div>
        Tworzenie notatki
         <form class='note-form' action='/?action=create' method='post'>
                <div id='name'>
                 Tytuł: <input type=text name='name'/><br/>
                </div>
                <div id='content'>
                 Treść: <input type=text name='content' size='20'/><br/>
                </div>
                <div id='user_data'>
                 <a href='note_created.php'><input type=submit value='Stwórz'/></a>
                </div>
        </form>
       </div>
       <div class='container'>
        <div class='menu'>
         <ul>
          <li><a href='/?action=edit'  >Edytuj notatkę</a></li>
          <li><a href='/?action=delete'>Usuń notatkę</a></li>
          <li><a href='/?action=settings'>Ustawienia konta</a></li>
          <li><a href='/?action=logout'>Wyloguj</a></li>  
          
         </ul>
         </div>
      </div>";
    }

    public function badRepeatPassword(): void
    {
        echo "<div>
        <h3> Logowanie </h3>
        <div>
          <form class='note-form' action='/?action=checking_login' method='post'>
            <ul>
                Login:
                <div id='login'>
                 <input type=text name='login'/><br/>
                </div>
                Hasło:
                <div id='password'>
                 <input type=password name='register'/><br/>
                </div>
                <div id='user_data'>
                 <a href='checking_login.php'><input type=submit value='Zaloguj'/></a>
                </div>
              
                Niepoprawny login lub hasło, spróbuj ponownie.
              
            </ul>
          </form>
          <a href='/'>Powrót</a>
      
        </div>
      </div>";
    }

    public function passwordChange(): void
    {
      $this->view_picture();  

      echo "<br>";
echo "<div>
<div>
  <form class='note-form' action='/?action=passwordChanged' method='post'>
    <ul>

    Twoje hasło: <div id='change_password1'>
    <input type=password name='change_password1'/><br/>
   </div>
    Powtórz hasło: <div id='change_password2'>
    <input type=password name='change_password2'/><br/>
   </div>
     Nowe hasło: <div id='new_change_password1'>
    <input type=password name='new_change_password1'/><br/>
   </div>
    Powtórz nowe hasło: <div id='new_change_password2'>
    <input type=password name='new_change_password2'/><br/>
   </div>
   <div id='password_change'>
    <a href='/?action=passwordChanged'><input type=submit value='Zaloguj'/></a>
   </div>
  </ul>
  </form>

  <a href='/?action=settings'>Powrót</a> 
        </div>

        
   
</div>

";
    }

    public function note_created(): void
    {
      $this->view_picture();  
      echo "Notatka stworzona";
      $this->user();
    }

    public function register(): void
    {
      echo "<div>
      <h3> Rejestracja </h3>
      <div>
        <form class='note-form' action='/?action=createUser' method='post'>
          <ul>
            
              Login:          <div id='createLogin'>
              <input type=text name='createLogin'/><br/>
              </div>
              Hasło:          <div id='createPassword'>
              <input type=password name='createPassword'/><br/>
              </div>
              Powtórz hasło:  <div id='repeatPassword'>
              <input type=password name='repeatPassword'/><br/>
              </div>
              <div id='create'>
                <a href='...'><input type=submit value='Stwórz konto'/></a>
              </div> 
            
          </ul>
        </form>
        <a href='/'>Powrót</a>
      </div>
    </div>
    ";
    }

    public function view_editTitle(): void
    {
       $title = $_SESSION['title'];
       $this->view_picture();  

      echo "<div> 
    <h3>Zmiana tytułu notatki:</h3>
    <div>
    <form class='note-form' action='/?action=ready_edition_title' method='post'>
    <ul>
    
    Treść: <div id='content'>
    <input type=text name='title' value='$title'>
    </div>
    <div id='content_edit_submit'>
    <a href='ready_edition_title.php'><input type=submit value='Edytuj'>
    </ul>
    </form>
    <a href='/'>Powrót</a> 
    </div>";
    }

    public function view_editContent(): void
    {
      $content = $_SESSION['content'];
      $this->view_picture();

  
      echo "<div> 
      <h3>Zmiana treści notatki:</h3>
      <div>
      <form class='note-form' action='/?action=ready_edition_content' method='post'>
      <ul>
      
      Treść: <div id='content'>
      <input type=text name='content' value='$content'>
      </div>
      <div id='content_edit_submit'>
      <a href='ready_edition_content.php'><input type=submit value='Edytuj'>
      </ul>
      </form>
      <a href='/'>Powrót</a> 
      </div>";
    }
    
     public function editionView(): void
     {
      $this->view_picture();  
      echo "<br>";
      echo "<div>
      <div>
        <form class='note-form' action='/?action=edition_title' method='post'>
          <ul>
      
              <div id='edition_title'>
               <a href='edition_title.php'><input type=submit value='Zmień tytuł'/></a>
              </div>
              </ul>
              </form>
              </div>
        <div>    
        <div>
        <form class='note-form' action='/?action=edition_content' method='post'>
          <ul>
      
              <div id='edition_content'>
               <a href='edition_content.php'><input type=submit value='Edytuj treść'/></a>
              </div>
              </ul>
              </form>
              </div>
        <div>
        <a href='/?action=edit'>Powrót</a>    
      </div>
      
      ";
     }

     public function settings()
     {
      $this->view_picture();  
      echo "<div class='menu'>
      <ul>
       <li><a href='/?action=addProfilePicture'  >Dodaj zdjęcie profilowe</a></li>
       <li><a href='/?action=addBackgroundPhoto'>Zdjęcie w tle</a></li>
       <li><a href='/?action=passwordChange'>Zmiana hasła</a></li>
       <li><a href='/?action=logout'>Wyloguj</a></li>  
       <br></br>
       <a href='/?action=view_user'><---Powrót na konto użytkownika</a>
      
             
      
      ";
     }

     public function settings_after_add_photo()
     {
      echo "<div class='menu'>
      <ul>
       <li><a href='/?action=addProfilePicture'  >Dodaj zdjęcie profilowe</a></li>
       <li><a href='/?action=addBackgroundPhoto'>Zdjęcie w tle</a></li>
       <li><a href='/?action=passwordChange'>Zmiana hasła</a></li>
       <li><a href='/?action=logout'>Wyloguj</a></li>  
       <br></br>
       <a href='/?action=view_user'><---Powrót na konto użytkownika</a>
      
             
      
      ";
     }

     public function addProfilePicture()
     {
      if(empty($_SESSION['user'])) {
        $this->list();
      } else {
      $this->view_picture();  
      echo "<div>
      <h4>Dodaj nowe zdjęcie profilowe:</h4>
       <form class='note-form' action='/?action=additionProfilePicture' method='post'>
          <div id='urlProfilePicture'>
           Wklej link url zdjęcia: <input type='text' name='urlProfilePicture' size='30'/></br>
          </div>
          <div id='additionProfilePicutre>
           <a href='additionProfilePicutre.php'><input type='submit' value='Dodaj'/></a>
           <br></br>
           <a href='/?action=settings'><---Powrót do opcji</a>
      </div>";
    }
     }

     public function view_picture()
     {
       $picture = $_SESSION['picture'];
  
       echo "<img src='$picture' width='99' height='99' style='border: 1px black solid;'>";
       echo "<br></br>";
     }
    
    
    }
