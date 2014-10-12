<div class="form">
<?php
        $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'addRole',
                    'enableAjaxValidation'=>true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'validateOnChange'=>false,
                        'validateOnType'=>false,
                    ),
                    'htmlOptions'=>array('class'=>'form',),
                    //'action' => array('site/login'), 
                )
            );
?>
    
<p class="note">fields with <span class="required">*</span> are required.</p>

<div class="row">
    <?php echo $form->labelEx($model,'module') . "\n"; ?>
    <?php echo $form->textField($model,'module'). "\n"; ?>
    <?php echo $form->error($model,'module'). "\n"; ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'alias') . "\n"; ?>
    <?php echo $form->textField($model,'alias'). "\n"; ?>
    <?php echo $form->error($model,'alias'). "\n"; ?>
</div>

<div class="row">
     <input type="hidden" name="view" value="role">
    <input type="hidden" name="action" value="add-role">
</div>

<div class="row buttons">
<?php
    echo CHtml::ajaxSubmitButton ("Add",
                array('/admin/ajax'),
                            array(
                                'dataType'=>'json',
                                'type' => 'post',
                                'update' => '#addPermission',
                                'success'=>'function(data) {
                                                $("#addRoleModalForm").dialog("close");
                                                $("#content-admin").html(data);
                                                /*if(data.status=="success") {
                                                    $("#LoginForm")[0].reset();
                                                    $("#loginModalForm").dialog("close");
                                                    $(".user_reg_buttons").html(data.user_reg_buttons);
                                                }
                                                 else {
                                                    $.each(data, function(key, val) {
                                                        $(".errorSummary, .errorMessage").hide();
                                                        $("#LoginForm #"+key+"_em_").text(val);                                                    
                                                        $("#LoginForm #"+key+"_em_").show();
                                                    });
                                                }*/
                                            }',
                            )
    );
  ?></div>
<?php   
    $this->endWidget();
?>
</div>