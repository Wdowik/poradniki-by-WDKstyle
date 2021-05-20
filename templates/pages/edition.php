<?php

declare(strict_types=1);

namespace App;

require_once("./src/Database.php");

//$_SESSION['id'] = $_POST["edit_notes"];

echo "Test";
echo "Edition notes ;)";
echo $_SESSION['id'];

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
</div>

";