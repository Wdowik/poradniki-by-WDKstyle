<?php

declare(strict_types=1);

namespace App;

echo "<br>";
echo "<div>
<div>
  <form class='note-form' action='/?action=edition' method='post'>
    <ul>
      
        Wpisz id notatki, którą chcesz edytować: <div id='edit_notes'>
         <input type=text name='edit_notes'/><br/>
        </div>
        <div id='user_data'>
         <a href='edition.php'><input type=submit value='Edytuj'/></a>
        </div>
      
        
      
    </ul>
  </form>

</div>
</div>";