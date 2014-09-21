


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
                )
            );
        $model= new FilterForm;
?>
    <div class="filters-label">
        Фільтри:
    </div>
    <div class="filter-country">
        <?php echo $form->labelEx($model,'country') . "\n"; ?>
        <?php echo $form->dropDownList($model,'country', array()). "\n"; ?>
        <?php echo $form->error($model,'country') . "\n"; ?>
    </div>
    <div class="filter-sity">
        <?php echo $form->labelEx($model,'sity') . "\n"; ?>
        <?php echo $form->dropDownList($model,'sity', array()). "\n"; ?>
        <?php echo $form->error($model,'sity') . "\n"; ?>
    </div>
    
    <div class="filter-style">
        <?php echo $form->labelEx($model,'style') . "\n"; ?>
        <?php echo $form->dropDownList($model,'style', array()). "\n"; ?>
        <?php echo $form->error($model,'style') . "\n"; ?>
    </div>
    <div class="filter-genre">
        <?php echo $form->labelEx($model,'genre') . "\n"; ?>
        <?php echo $form->dropDownList($model,'genre', array()). "\n"; ?>
        <?php echo $form->error($model,'genre') . "\n"; ?>
    </div>

    <div class="price-scroll">
        <h1>Квиткові ціни:</h1>
<label for="min">Діапазон цін:</label>
<input type="text" class="min" value="1050-2750" />
<?php
$this->widget('zii.widgets.jui.CJuiSliderInput', array(
    'name'=>'slider_range',
     
    'event'=>'change',
    'options'=>array(
        'values'=>array(1050,2750),// default selection
        'min'=>0, //minimum value for slider input
        'max'=>5000, // maximum value for slider input
        'animate'=>true,
        // on slider change event 
        'slide'=>'js:function(event,ui){$(".price-scroll .min").val(ui.values[0]+\'-\'+ui.values[1]);}',
    ),
    // slider css options
    'htmlOptions'=>array(
        'style'=>''
    ),
)); ?>
    </div>
    <div class="calendar">
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'language'=>'uk',
    'name'=>'datepicker-month-year-menu',
    'flat'=>true,//remove to hide the datepicker
    'options'=>array(
	    'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'changeMonth'=>true,
        'changeYear'=>true,
        'yearRange'=>'2000:2099',
        'minDate' => '2000-01-01',      // minimum date
        'maxDate' => '2099-12-31',      // maximum date
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
)); ?>
    </div>
    <?php
    $this->endWidget(); ?>
</div>
<div class="events">
    <div class="events-sorting">  
    </div>
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>    
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
             <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>  
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
             <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>  
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
             <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>  
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
             <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>  
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
             <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>  
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
             <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>  
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
             <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>  
    <div class="event">
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
             <a href=""><span>Американський папа</span><br/><br/><br/>Содружество — мир звездных империй и высоких технологий. Множество населенных людьми и негуманоидами планет. Землянину предстоит пройти нелегкий путь, став бойцом отряда наемников. Он окажется в центре межзвездного конфликта и прикоснется к тайнам исчезнувших цивилизаций. Его зовут Гарт, и он — Одаренный!</a> 
    </div>  
   
    <div class="pagination-link">  
        <ul>
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">5</a></li>
                    <li><a href="">6</a></li>
                    <li><a href="">7</a></li>
                </ul>
    </div>
     <?php $pages=new CPagination(10); $pages->pageSize=10; $this->widget('CLinkPager',array(
             'pages'=>$pages, 
             'maxButtonCount' => 5, 
             'header' => '<b>'.Yii::t("main", "Перейти к странице:").'</b><br><br>',
     )); ?>
</div>