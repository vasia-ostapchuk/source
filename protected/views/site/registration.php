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
            <?php echo $form->labelEx($model,'first_name'); ?>
            <?php echo $form->textField($model,'first_name', array('placeholder'=>'Іван')); ?>
            <?php echo $form->error($model,'first_name'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'last_name'); ?>
            <?php echo $form->textField($model,'last_name', array('placeholder'=>'Іванов')); ?>
            <?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'password_repeat'); ?>
            <?php echo $form->passwordField($model,'password_repeat'); ?>
            <?php echo $form->error($model,'password_repeat'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email', array('placeholder'=>'some@example.com')); ?>
            <?php echo $form->error($model,'email'); ?>
	</div>
        
        <div class="row">
            <?php
            echo $form->labelEx($model,'birthday');
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'language'=>'uk',
                'id'=>'birthday',   
                'name'=>'birthday',
                'model' => $model,
                'attribute' => 'birthday',
                'value'=>date('d/m/Y'),
                'options'=>array(
                    'showButtonPanel'=>true,
                    'dateFormat'=>'dd/mm/yy',
                ),
                'htmlOptions' => array(
                    'placeholder'=>'dd/mm/yy'
                ),
            ));
            ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'phone'); ?>
            <?php echo $form->textField($model,'phone', array('placeholder'=>'+380-XX-NNNNNNN')); ?>
            <?php echo $form->error($model,'phone'); ?>
            <p class="hint">
            XX — XX — Код міста, Z — Код країни, NNNNNNN — Телефонний номер
        </p>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Реєстрація'). "\n"; ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->