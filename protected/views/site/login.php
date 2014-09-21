<div class="form">
<?php
        $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'LoginForm',
                    'enableAjaxValidation'=>true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'validateOnChange'=>false,
                        'validateOnType'=>false,
                    ),
                    'htmlOptions'=>array('class'=>'form',),
                    'action' => array('site/login'), // когда форма показывается и в других контроллерах, не только 'site', то я в каждый из этих контроллеров вставил actionQuick, a здесь указал — array('quick'); почему-то не получается с array('//site/quick')
                )
            );
?>
<p class="note">Поля з <span class="required">*</span> є обов'язкові.</p>
<div class="row">
    <?php echo $form->labelEx($model,'username') . "\n"; ?>
    <?php echo $form->textField($model,'username'). "\n"; ?>
    <?php echo $form->error($model,'username'). "\n"; ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'password'). "\n"; ?>
    <?php echo $form->passwordField($model,'password'). "\n"; ?>
    <?php echo $form->error($model,'password'). "\n"; ?>
</div>

<div class="row rememberMe">
        <?php echo $form->checkBox($model,'rememberMe'). "\n"; ?>
        <?php echo $form->label($model,'rememberMe'). "\n"; ?>
        <?php echo $form->error($model,'rememberMe'). "\n"; ?>
</div>

<div class="row buttons">
        <?php //echo CHtml::submitButton('Вхід'). "\n"; ?>
</div>
<div class="row buttons">
<?php
    echo CHtml::ajaxSubmitButton ("Вхід",
                array('/site/login'),
                            array(
                                'dataType'=>'json',
                                'type' => 'post',
                                'update' => '#LoginForm',
                                'success'=>'function(data) {
                                                if(data.status=="success") {
                                                    $("#LoginForm")[0].reset();
                                                    $("#loginModalForm").dialog("close");
                                                    $("#login_button").hide();
                                                    $("#reg_button").hide();
                                                    $("#profile_button").show();
                                                    $("#logout").show();
                                                }
                                                 else {
                                                    $.each(data, function(key, val) {
                                                        $(".errorSummary, .errorMessage").hide();
                                                        $("#LoginForm #"+key+"_em_").text(val);                                                    
                                                        $("#LoginForm #"+key+"_em_").show();
                                                    });
                                                }
                                            }',
                            )
    );
  ?></div>
<?php   
    $this->endWidget();
?>
</div>