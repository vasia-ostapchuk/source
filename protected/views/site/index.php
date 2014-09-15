
Empty Start page's

        <?php
    echo "тестова аутентифікація через соціальні мережі <br>";
    $this->widget('ext.eauth.EAuthWidget', array('action' => 'site/login'));
    echo "---";
    ?>