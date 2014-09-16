<!-- макет модального вікна форми логінування на сайті -->

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'mydialog',
            'options' => array(
                'title' => 'Loging',
                'autoOpen' => false,
                'modal' => false,
                'resizable'=> false,
                'position'=> '{ my: "left top", at: "left bottom", of: button }',
            ),
        ));
?>
<div class="form">
<?php
    $model = new LoginForm; 
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'quick-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions'=>array('class'=>'form',),
                'action' => array('site/login'), // когда форма показывается и в других контроллерах, не только 'site', то я в каждый из этих контроллеров вставил actionQuick, a здесь указал — array('quick'); почему-то не получается с array('//site/quick')
            )
        );
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="row">
    <?php echo $form->labelEx($model,'username') . "\n"; ?>
    <?php echo $form->textField($model,'username'). "\n"; ?>
    <?php echo $form->error($model,'username'). "\n"; ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'password'). "\n"; ?>
    <?php echo $form->passwordField($model,'password'). "\n"; ?>
    <?php echo $form->error($model,'password'). "\n"; ?>
    <p class="hint">
            <!--Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.-->
    </p>
</div>

<div class="row rememberMe">
        <?php echo $form->checkBox($model,'rememberMe'). "\n"; ?>
        <?php echo $form->label($model,'rememberMe'). "\n"; ?>
        <?php echo $form->error($model,'rememberMe'). "\n"; ?>
</div>

<div class="row buttons">
        <?php echo CHtml::submitButton('Login'). "\n"; ?>
</div>

<?php   
    $this->endWidget();
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>