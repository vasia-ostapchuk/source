<!-- макет модального вікна форми логінування на сайті -->

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'loginModalForm',
            'options' => array(
                'title' => 'Вхід на сайт',
                'autoOpen' => false,
                'modal' => false,
                'resizable'=> false,
                'position'=> '{ my: "left top", at: "left bottom", of: button }',
            ),
        ));
?>
<!-- заголовок модального вікна
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h4>Вхід на сайт</h4>
    </div>-->
<!-- тіло модального вікна, виводимо елементи форми -->
    <div class="modal-body">
        <?php
            $login = new LoginForm;
            $reg = new RegistrationForm;

        $this->widget('zii.widgets.jui.CJuiTabs', array(
            'tabs'=>array(
            'Вхід'=>$this->renderPartial('login',array('model'=>$login),true),
            'Реєстрація'=>$this->renderPartial('registration',array('model'=>$reg),true),  
            
                ),
            'options'=>array(
                'collapsible'=>true,
            ),
        ));
        echo "<br> Аутентифікація через соціальні мережі <br>";
        $this->widget('ext.eauth.EAuthWidget', array('action' => 'site/login'));
        echo "<br>";
        ?>
    </div>

<!-- футер форми, де виводяться кнопки віправки форми и закриття модального вікна -->
    <!--<div class="modal-footer">
        <div class="row buttons">
        <?php //echo CHtml::submitButton('Login'). "\n"; ?>
        </div>
    </div>-->
<?php   
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>