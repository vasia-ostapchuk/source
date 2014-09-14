
Empty Start page's

<?php 
    $user = new User; 
    echo "<pre>"; 
    var_dump($user); 
    echo "</pre>"; 
    $user->sex_id=3;
    $user->state_id=3;
    
    $user->save();
    
    echo "<br>";
    
    echo "<pre>"; 
    var_dump($user); 
    echo "</pre>"; 
    
    ?>