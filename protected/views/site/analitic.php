<div class="analitic-content-site">
<div class="analitic-contet-left">
        <div class="analitic_filters"> 
        
         <?php
            echo CHtml::dropDownList('analitic-country', '', array('Країна'),array());

            ?>
          
            <?php
            echo CHtml::dropDownList('analitic-citi', '', array('Місто'),array());
            ?>
          
            <?php

            echo CHtml::dropDownList('analitic-style', '', array('Стиль'),array());
            ?>
            
            <?php
            echo CHtml::dropDownList('analitic-substyle', '', array('Підстиль'),array());
            ?>
        
        
        </div>
         
    <div class="analitic-calendar">

   <?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'language'=>'uk',
    'name'=>'datepicker-month-year-menu',
    'value'=>Filter::getCalendarDate(),
    'flat'=>true,//remove to hide the datepicker
    'options'=>array(
	    'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'changeMonth'=>true,
        'changeYear'=>true,
        'yearRange'=>'2000:2099',
        'minDate' => '2000-01-01',      // minimum date
        'maxDate' => '2099-12-31',      // maximum date
        'onSelect'=>"js:function(dateText){"
                            . "var date={date:dateText, id:'calendar'};"
                            . "$.ajax({"
                                    . " type: 'POST',"
                                    . " data:  date,"
                                    . " url:  'index.php?r=filter/calendar',"
                                    . " success: function(){" 
                                    . "}"
                                . "});"
                        . "}",
    ),
    'htmlOptions'=>array(
        'class'=>'widget-calendar',
        ),
)); ?>
        
    </div>
    
    <?php 
    echo CHtml::link('Звіти по параметрах',array('controller/action')); 
    ?>
    
    </div> 
 
   
    </div>
      
        
    </div>
    <div class="analitic-navigator">
        <div class="analitic-navigator-search">
        
        <form class="form-search-analitic" method="post" action="index.php?r=site/search">
            <input type="search" name="search" placeholder="пошук" value=""/>
            <input id="link" type="hidden" name ="id" value="google" />
            <input type="submit" value=""/>
        </form>
        <script>  
            $(document).ready(function(){ //відбувається після завантаження сторінки

                /*if($("#ProfileMenu").dialog().focusout()) {
                    $(document).click(function(event) { //автоматичне закриття діалогових вікон
                      if ($(event.target).closest('#ProfileMenu').length  || $(event.target).closest('#ProfileMenu').length) return;
                      $('#ProfileMenu').dialog('close');
                      event.stopPropagation();
                    });
                }*/

                $('.form-search').submit(function(e){ //обробка форми пошуку
                e.preventDefault();
                var m_method=$(this).attr('method');
                var m_action=$(this).attr('action');
                var m_data=$(this).serialize();
                    $.ajax({
                        type: m_method,
                        url: m_action,
                        data: m_data,
                        dataType: 'json',
                        success: function(data){
                            $('.events').html(data);
                        }
                    });
                });
            });
        </script>
    </div>
        </div>
    <div class="analitic-sorting">
        <?php echo CHtml::TextField('analitic-sorting-name', 'Cортувати по:',
                    array('disabled'=>'disabled','class'=>'analitic-sorting-name')); ?>
        <label id="analitic_sorting_label" title="Сортувати"> 
<?php echo CHtml::dropDownList('analitic_sorting_label', 'analitic_sorting_label', 
array('сортувати' => 'Сортувати',  'Сортувати' => 'Сщртувати'),
array('class' => 'language')
);
?>
</label>
    </div>
    <div class="analitic-content">
        <div class="analitic-content-description">
            <div class="analitic-singer">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виконавець',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-style">
                <?php echo CHtml::TextField('analitic-singer-style', 'Стиль',
                    array('class'=>'analitic-singer-style')); ?>
            </div>
            <div class="analitic-jut">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виступи',
                    array('class'=>'analitic-singer-jut')); ?>
            </div>
            <div class="analitic-visitors">
                <?php echo CHtml::TextField('analitic-singer-name', 'Відвідувачі',
                    array('class'=>'analitic-singer-visitors')); ?>
            </div>
            <div class="analitic-check">
                <?php echo CHtml::TextField('analitic-singer-name', 'Середній чек',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-content-button">
            
                <?php echo CHtml::button('Деталі',
                    array(
                        'id'=>'analitic-content-button',
                        'title'=>"",
                        'onclick'=>""
                        )); ?>
            </div>
        </div>
         <div class="analitic-content-description">
            <div class="analitic-singer">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виконавець',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-style">
                <?php echo CHtml::TextField('analitic-singer-style', 'Стиль',
                    array('class'=>'analitic-singer-style')); ?>
            </div>
            <div class="analitic-jut">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виступи',
                    array('class'=>'analitic-singer-jut')); ?>
            </div>
            <div class="analitic-visitors">
                <?php echo CHtml::TextField('analitic-singer-name', 'Відвідувачі',
                    array('class'=>'analitic-singer-visitors')); ?>
            </div>
            <div class="analitic-check">
                <?php echo CHtml::TextField('analitic-singer-name', 'Середній чек',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-content-button">
            
                <?php echo CHtml::button('Деталі',
                    array(
                        'id'=>'analitic-content-button',
                        'title'=>"",
                        'onclick'=>""
                        )); ?>
            </div>
        </div>
         <div class="analitic-content-description">
            <div class="analitic-singer">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виконавець',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-style">
                <?php echo CHtml::TextField('analitic-singer-style', 'Стиль',
                    array('class'=>'analitic-singer-style')); ?>
            </div>
            <div class="analitic-jut">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виступи',
                    array('class'=>'analitic-singer-jut')); ?>
            </div>
            <div class="analitic-visitors">
                <?php echo CHtml::TextField('analitic-singer-name', 'Відвідувачі',
                    array('class'=>'analitic-singer-visitors')); ?>
            </div>
            <div class="analitic-check">
                <?php echo CHtml::TextField('analitic-singer-name', 'Середній чек',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-content-button">
            
                <?php echo CHtml::button('Деталі',
                    array(
                        'id'=>'analitic-content-button',
                        'title'=>"",
                        'onclick'=>""
                        )); ?>
            </div>
        </div>
         <div class="analitic-content-description">
            <div class="analitic-singer">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виконавець',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-style">
                <?php echo CHtml::TextField('analitic-singer-style', 'Стиль',
                    array('class'=>'analitic-singer-style')); ?>
            </div>
            <div class="analitic-jut">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виступи',
                    array('class'=>'analitic-singer-jut')); ?>
            </div>
            <div class="analitic-visitors">
                <?php echo CHtml::TextField('analitic-singer-name', 'Відвідувачі',
                    array('class'=>'analitic-singer-visitors')); ?>
            </div>
            <div class="analitic-check">
                <?php echo CHtml::TextField('analitic-singer-name', 'Середній чек',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-content-button">
            
                <?php echo CHtml::button('Деталі',
                    array(
                        'id'=>'analitic-content-button',
                        'title'=>"",
                        'onclick'=>""
                        )); ?>
            </div>
        </div>
        <div class="analitic-pagination-link">  
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
    </div>
    

</div>

    