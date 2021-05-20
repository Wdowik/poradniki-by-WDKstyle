<?php

declare(strict_types=1);

namespace App;

echo "<div>
    <h4>Dodaj nowe zdjęcie profilowe:</h4>
     <form class='note-form' action='/?action=additionProfilePicture' method='post'>
        <div id='urlProfilePicture'>
         Wklej link url zdjęcia: <input type='text' name='urlProfilePicture' size='30'/></br>
        </div>
        <div id='additionProfilePicutre>
         <a href='additionProfilePicutre.php'><input type='submit' value='Dodaj'/></a>
</div>";