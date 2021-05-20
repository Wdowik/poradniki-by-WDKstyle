<html lang="pl">

<head>
 <title>Notatnik</title>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
 <link href="/public/style.css" rel="stylesheet">
</head>

<body class="body">
 <div class="wrapper">
 <div class="header">
  <h1><i class="far fa-clipboard"></i>Poradniki
  </h1>
 </div>

 <div class="container">
  <div class="menu">
   <ul>
    <li><a href="/">Strona główna</a></li>
    <li><a href="/?action=login">Logowanie</a></li>
    <li><a href="/?action=register">Rejestracja</a></li>
    (Top 5 poradników)
    <br></br>
    <form class="note-form" action="/?action=search_ABC" method="post">
    <a href="/?actionABC=A">A</a>
    <a href="/?actionABC=B">B</a>
    <a href="/?actionABC=C">C</a>
    <a href="/?actionABC=D">D</a>
    <a href="/?actionABC=E">E</a>
    <a href="/?actionABC=F">F</a>
    <a href="/?actionABC=G">G</a>
    <a href="/?actionABC=H">H</a>
    <a href="/?actionABC=I">I</a>
    <a href="/?actionABC=J">J</a>
    <a href="/?actionABC=K">K</a>
    <a href="/?actionABC=L">L</a>
    <a href="/?actionABC=M">M</a>
    <a href="/?actionABC=N">N</a>
    <a href="/?actionABC=O">O</a>
    <a href="/?actionABC=P">P</a>
    <a href="/?actionABC=N">Q</a>
    <a href="/?actionABC=R">R</a>
    <a href="/?actionABC=S">S</a>
    <a href="/?actionABC=T">T</a>
    <a href="/?actionABC=U">U</a>
    <a href="/?actionABC=V">V</a>
    <a href="/?actionABC=W">W</a>
    <a href="/?actionABC=X">X</a>
    <a href="/?actionABC=Y">Y</a>
    <a href="/?actionABC=Z">Z</a>
    </form>
    
    <br></br>
    

    <form class="note-form" action="/?action=search" method="post">
    <div id="search">
      Wyszukaj: <input type=text name="search"></br> 
    </div>
    <div id="send_button">
                <a href="search.php"><input type=submit value="Szukaj"/></a>
    </div>
    </form>
   </ul>
   
  

  <div class="footer">
  <p>Poradniki.pl - by WDK</p>
  </div>   
</body>
</html>