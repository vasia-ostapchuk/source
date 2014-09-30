<!-- макет модального вікна форми логінування на сайті -->

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'loginModalForm',
            'options' => array(
                'title' => 'Вхід на сайт',
                'autoOpen' => false,
                'modal' => false,
                'show'=>array(
                    'effect'=>'blind',
                    'duration'=>500,
                ),
                'hide'=>array(
                    'effect'=>'blind',
                    'duration'=>500,
                ),
                'resizable'=> false,
                'position'=> "{ my=>'right top', at=>'left bottom', of=> '#login_button' }",
            ),
        ));
?>
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
                'collapsible'=>false,
                'selected' => 2,
            ),
        ));
        echo "<br> Аутентифікація через соціальні мережі <br>";
        $this->widget('ext.eauth.EAuthWidget', array('action' => 'site/login'));
        echo "<br>";
        ?>
    </div>
<?php   
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<!-- макет модального вікна форми профайлу -->

    <?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id' => 'ProfileMenu',
                'options' => array(
                    'title' => 'Профайл',
                    'autoOpen' => false,
                    'modal' => false,
                    'show'=>array(
                        'effect'=>'blind',
                        'duration'=>300,
                    ),
                    'hide'=>array(
                        'effect'=>'blind',
                        'duration'=>300,
                    ),
                    'resizable'=> false,
                ),
            ));
echo '<br>'; echo CHtml::link('Translation',array('site/translate'));
echo '<br>'; echo CHtml::link('Administration',array('site/administration'));
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>