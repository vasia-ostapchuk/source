
Empty Start page's
<br>
то типу головна сторінка сайту 
<br>

        <?php
    echo "тестова аутентифікація через соціальні мережі <br>";
    $this->widget('ext.eauth.EAuthWidget', array('action' => 'site/login'));
    echo "---";
    ?>