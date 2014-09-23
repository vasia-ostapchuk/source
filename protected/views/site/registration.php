<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'RegistrationForm',
        'enableAjaxValidation'=>true,
	'clientOptions'=>array(
            'validateOnSubmit' => true,
            'validateOnChange'=>false,
            'validateOnType'=>false,
	),
        'htmlOptions'=>array('class'=>'form',),
        'action' => array('site/signup'),
)); ?>

<p class="note">Поля з <span class="required">*</span> є обов'язкові.</p>

<div class="row">
    <?php echo $form->textField($model,'email', array('placeholder'=>'* '.$model->getAttributeLabel('email')));  ?>
    <?php echo $form->error($model,'email'); ?>
</div>

<div class="row">
    <?php echo $form->passwordField($model,'password', array('placeholder'=>'* '.$model->getAttributeLabel('password'))); ?>
    <?php echo $form->error($model,'password'); ?>
</div>

<div class="row">
    <?php echo $form->passwordField($model,'password_repeat', array('placeholder'=>$model->getAttributeLabel('password_repeat'))); ?>
    <?php echo $form->error($model,'password_repeat'); ?>
</div>

<div class="row">
    <?php
    /*$this->widget('zii.widgets.jui.CJuiDatePicker',array(
        'language'=>'uk',
        'id'=>'birthday',   
        'name'=>'birthday',
        'model' => $model,
        'attribute' => 'birthday',
        'value'=>date('Y-m-d'),
        'options'=>array(
            'showButtonPanel'=>true,
            'dateFormat'=>'yy-mm-dd',
            'changeYear'=>true,
            'changeMonth'=>true,
            'yearRange'=>'1900:2099',
        ),
        'htmlOptions' => array(
            'placeholder'=>$model->getAttributeLabel('birthday')
        ),
    ));*/
    ?>
</div>

<!--<div class="row">
    <?php/* echo $form->textField($model,'phone', array('placeholder'=>'* '.'+380-XX-NNNNNNN'));*/ ?>
    <?php// echo $form->error($model,'phone'); ?>
</div>-->
<?php //echo $form->dropDownList($model,'sex_id',array('чоловік','жінка'), array('placeholder'=>'Стать')); ?>
<div class="row buttons">
        <?php// echo CHtml::submitButton('Реєстрація'). "\n"; ?>
</div>
<div class="row buttons">
<?php
    echo CHtml::ajaxSubmitButton ("Реєстрація",
                array('/site/signup'),
                            array(
                                'dataType'=>'json',
                                'type' => 'post',
                                'update' => '#RegistrationForm',
                                'success'=>'function(data) {
                                                if(data.status=="success") {
                                                    $("#RegistrationForm")[0].reset();
                                                    $("#loginModalForm").dialog("open");
                                                    $("#loginModalForm").tabs({"selected":0});
                                                }
                                                 else {
                                                     $.each(data, function(key, val) {
                                                        $(".errorSummary, .errorMessage").hide();
                                                        $("#RegistrationForm #"+key+"_em_").text(val);                                                    
                                                        $("#RegistrationForm #"+key+"_em_").show();
                                                    });
                                                }
                                            }',
                            )
    );
  ?></div>


<?php $this->endWidget(); /* $(".errorSummary, .errorMessage").hide();*/?> 
</div><!-- form -->