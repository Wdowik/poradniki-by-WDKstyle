<?php

declare(strict_types=1);

namespace App;

echo "<div>
    <h4>Dodaj nowe zdjęcie w tle:</h4>
     <form class='note-form' action='/?action=additionBackgroundPhoto' method='post'>
        <div id='urlBackgroundPhoto'>
         Wklej link url zdjęcia: <input type='text' name='urlBackgroundPhoto' size='30'/></br>
        </div>
        <div id='submitBackgroundPhoto'>
         <a href='additionBackgroundPhoto.php'><input type='submit' value='Dodaj'/></a>
</div>";