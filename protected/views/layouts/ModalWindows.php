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
            'Вхід'=>$this->renderPartial('application.views.site.login',array('model'=>$login),true),
            'Реєстрація'=>$this->renderPartial('application.views.site.registration',array('model'=>$reg),true),
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
echo '<br>'; echo CHtml::ajaxlink('Translation',
                    CController::createUrl('/site/viewtranslate'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'success'=>"function(data) {
                                $('#ProfileMenu').dialog('close');
                                        $('#content').html(data);
                                    }",
                        )
                    );
echo '<br>'; echo CHtml::ajaxlink('Administration',
                    CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array('view' => 'index'),
                            'success'=>"function(data) {
                                $('#ProfileMenu').dialog('close');
                                        $('#content').html(data);
                                    }",
                        )
                    );
echo '<br>'; echo CHtml::ajaxlink('artist',
                    CController::createUrl('/site/artist'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'success'=>"function(data) {
                                $('#ProfileMenu').dialog('close');
                                        $('#content').html(data);
                                    }",
                        )
                    );
echo '<br>'; echo CHtml::ajaxlink('event',
                    CController::createUrl('/site/event'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'success'=>"function(data) {
                                $('#ProfileMenu').dialog('close');
                                        $('#content').html(data);
                                    }",
                        )
                    );
echo '<br>'; echo CHtml::ajaxlink('eventUserProgress',
                    CController::createUrl('/site/eventUserProgress'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'success'=>"function(data) {
                                $('#ProfileMenu').dialog('close');
                                        $('#content').html(data);
                                    }",
                        )
                    );
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<!-- модель модального вікна форми event -->

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'eventUserProgress',
    'options'=>array(
        'title'=>'Dialog box',
        'autoOpen'=>false,
    ),
    'htmlOptions'=>array('class'=>'user-progress')
)); ?>
    <div class="event-link">
        <ul>
            <li><?php echo CHtml::link('Підписані', array('controller/action')); ?></li>
            <li><?php echo CHtml::link('Друзі', array('controller/action')); ?></li>
        </ul>
    </div>
    <div class="eventsUsers">
        <div class="checkbox">
            <?php echo CHtml::CheckBox('checkbox',false, array (
                'value'=>'on',
            )); ?>
            <span>Купили квиток</span>
        </div>
        <div class="user-data">
            <div class="avatar">
                <?php echo CHtml::image('../../../images/testAvatar.jpg','назва',
                    array(
                    'class'=>'avatar',
                )); ?>           
            </div>
            <span class='user-name'>
                <?php echo CHtml::textField('Text', 'Прізвище та Ім\'я', 
                    array('disabled'=>true
                )); ?>
            </span>
        </div>
        <div class="user-data">
            <div class="avatar">
                <?php echo CHtml::image('../../../images/testAvatar.jpg','назва',
                    array(
                    'class'=>'avatar',
                )); ?>           
            </div>
            <span class='user-name'>
                <?php echo CHtml::textField('Text', 'Прізвище та Ім\'я', 
                    array('disabled'=>true
                )); ?>
            </span>
        </div>
    </div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');
?>