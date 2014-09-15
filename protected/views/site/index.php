
Empty Start page's

<?php 
    $user = new User; 
    echo "<pre>"; 
    //var_dump($user->findUserByUsername('1')->attributes); 
    echo "</pre>"; 
    /*$user->sex_id=3;
    $user->state_id=3;
    
    $user->save();
    
    echo "<br>";
    
    echo "<pre>"; 
    var_dump($user); 
    echo "</pre>"; */
    echo "--- <br>";
    echo "тестова аутентифікація через соціальні мережі <br>";
    $this->widget('ext.eauth.EAuthWidget', array('action' => 'site/login'));
    echo "---";
    ?>

<br> 
<a href="http://music.localhost/index.php?r=site/login" > Залогінуватись </a>