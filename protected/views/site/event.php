<div class="filters">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'FilterForm',
            'enableAjaxValidation'=>true,
            'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange'=>false,
            'validateOnType'=>false,
            ),
            'htmlOptions'=>array('class'=>'form',),
            'action' => array(''), // когда форма показывается и в других контроллерах, не только 'site', то я в каждый из этих контроллеров вставил actionQuick, a здесь указал — array('quick'); почему-то не получается с array('//site/quick')
        ));
        $model= new FilterForm;
    ?>
        <div class="filters-label">
            Фільтри:
        </div>
        <div class="filter-label">
            <?php echo $form->labelEx($model,'country') . "\n"; ?>
            <?php
            echo CHtml::dropDownList('country', '', array('country'),array());

            ?>
            <?php echo $form->error($model,'country') . "\n"; ?>
        </div>
        <div class="filter-label">
            <?php echo $form->labelEx($model,'city') . "\n"; ?>
            <?php
            echo CHtml::dropDownList('city', '', array('city'),array());
            ?>
            <?php echo $form->error($model,'city') . "\n"; ?>
        </div>

        <div class="filter-label">
            <?php echo $form->labelEx($model,'style') . "\n"; ?>
            <?php

            echo CHtml::dropDownList('style', '', array('style'),array());
            ?>
            <?php echo $form->error($model,'style') . "\n"; ?>
        </div>
        <div id="bottom-block" style="background: #777; color: #FFF;"></div>
            <?php
            $this->endWidget(); ?>
</div>