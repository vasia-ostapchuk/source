<aside>
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
            Пошук виконавця(В розробці)
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
        <div class="checkbox">
            <?php echo CHtml::CheckBox('checkbox',false, array (
                'value'=>'on',
            )); ?>
            <span>Підстиль1</span>
        </div>
        <div class="checkbox">
            <?php echo CHtml::CheckBox('checkbox',false, array (
                'value'=>'on',
            )); ?>
            <span>Підстиль2</span>
        </div>
        <div class="checkbox">
            <?php echo CHtml::CheckBox('checkbox',false, array (
                'value'=>'on',
            )); ?>
            <span>Підстиль3</span>
        </div>
        <div class="checkbox">
            <?php echo CHtml::CheckBox('checkbox',false, array (
                'value'=>'on',
            )); ?>
            <span>Підстиль4</span>
        </div>
        <div class="checkbox">
            <?php echo CHtml::CheckBox('checkbox',false, array (
                'value'=>'on',
            )); ?>
            <span>Підстиль5</span>
        </div>
            <?php
            $this->endWidget(); ?>
</aside>
<article>
    <div class="current-events">
        <div class="event">

        </div>
        <div class="event">

        </div>
        <div class="event">

        </div>
    </div>
    <div class="status-event">
        <span>Стан події відносно системи</span>
    </div>
    <div class="singer_left_block">
        <div class="singer_poster">
            <?php echo CHtml::image('../../../images/2poster.jpg','назва',
                array(
                'class'=>'singer_poster_image',
            )); ?>           
        </div>
        <div class="singer_name">  
            <?php echo CHtml::textField('Text', 'Друга ріка',
                array('disabled'=>'disabled','class'=>'name_poster')); ?>
        </div>
        <div class="page-link">
            <a href="">Перехід на сторінку</a>
        </div>
        <div class="singer_style"> 
            <p><span class="style_singer">Стилі</span></p>
            <ul>
                <li>Джаз</li>
                <li>Блюз</li>
                <li>Реп</li>
                <li>Поп</li>
            </ul>
        </div>
        <div class="singer_description"> 
            <form name="myform" action="index.php" method="post">

                <textarea name="mybox" cols="75" rows="5" wrap="hard" class="description_singer">
                    Групу заснували Віктор Скуратовський, Валерій Харчишин та Олександр Барановський 1995 року. Перші репетиції групи, який отримав назву «Second River», проходили в приміщенні Житомирського педадогічного інституту, де й відбувся їх перший виступ. У 1998 році, під час підготовки до фестивалю «Червона рута—1999» назву було змінено на «Друга Ріка».
                </textarea>
            </form>
        </div>
        <div class="singer_site"> 
            <?php echo CHtml::textField('Text', 'Сайт',
                 array('disabled'=>'disabled','class'=>'site_singer')); ?>

        </div>
    </div>
    <div class="buttons">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'ButtonForm',
                    'enableAjaxValidation'=>true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'validateOnChange'=>false,
                        'validateOnType'=>false,
                    ),
                    'htmlOptions'=>array('class'=>'form',),
                    'action' => array(''), // когда форма показывается и в других контроллерах, не только 'site', то я в каждый из этих контроллеров вставил actionQuick, a здесь указал — array('quick'); почему-то не получается с array('//site/quick')
                )
            );
        $model= new FilterForm;
        
        echo CHtml::button('Запит',
                    array(
                        'id'=>'button',
                        'title'=>"",
                        'onclick'=>""
                        ));
        echo '<br>'; echo CHtml::button('Підписати',
                    array(
                        'id'=>'button',
                        'title'=>"",
                        'onclick'=>""
                        ));
        echo '<br>'; echo CHtml::button('Розказати',
                    array(
                        'id'=>'button',
                        'title'=>"",
                        'onclick'=>""
                        ));
        echo '<br>'; echo CHtml::button('Прогрес',
                    array(
                        'title' => 'User Progress',
                        'onclick'=>"js:$('#eventUserProgress').dialog('open');"
                        )
                    );
        ?>
        <div class="userProgress"><?php
            echo CHtml::label(Yii::t('demo', '555/1500'), 'nombre');?>
        </div>
        <?php echo CHtml::button('Інвестувати',
                    array(
                        'id'=>'button',
                        'title'=>"",
                        'onclick'=>""
                        ));?>
        <div class="userProgress"><?php
            echo CHtml::label(Yii::t('demo', '777/3000'), 'nombre');?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</article>