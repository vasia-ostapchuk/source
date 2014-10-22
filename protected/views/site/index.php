<div class="main_menu">
    <?php echo $main_menu; ?>
</div>
<script type='text/javascript'>
    function findPoster(){
        var jdata = {id:"poster"};
        $.ajax({
            url: 'index.php?r=site/ajax',
            dataType: "json",
            data: jdata,
            type: 'POST',
            success: function(html){
                    $(".events").html(html);
                    }
            });
    };
    
    function printPoster(html){
        
    }
</script>
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
    ?>
    <div class="filters-label">
        Фільтри:
    </div>
    <div class="filter-label">
        <?php echo $form->labelEx($model,'country') . "\n"; ?>
        <?php // echo $form->dropDownList($model,'country', $contry) . "\n"; ?>
        <?php 
            if(Filter::getCountryId()) 
            {
                $options[Filter::getCountryId()]=array('selected'=>true);
            } else {
                $options[0] = array('selected'=>true);
            }
            echo CHtml::dropDownList('country', '', $country,array(
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('filter/country'),
                    //'update'=>'#city',
                    'success'=>'function(jdata){'
                                . 'var data = $.parseJSON(jdata);'
                                . 'jQuery("#city").html(data.data);'                          
                            . '}',
                ),
                'options' => $options,
            )); 
        //CHtml::dropDownList($name, $select, $data, $htmlOptions)
            $options = null;
        ?>
        <?php echo $form->error($model,'country') . "\n"; ?>
    </div>
    <div class="filter-label">
        <?php echo $form->labelEx($model,'city') . "\n"; ?>
        <?php //echo $form->dropDownList($model,'city', $city). "\n"; ?>
        <?php 
            if(Filter::getCityId()) 
            {
                $options[Filter::getCityId()]=array('selected'=>true);
            } else {
                $options[0] = array('selected'=>true);
            }
            echo CHtml::dropDownList('city', '', $city,array(
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('filter/city'),
                    'success'=>'function(){'
                                . '/*jQuery("#city").html(html);*/'
                            . '}',
                ),
                'options' => $options,
            )); 
        //CHtml::dropDownList($name, $select, $data, $htmlOptions)
            $options = null;
        ?>
        <?php echo $form->error($model,'city') . "\n"; ?>
    </div>

    <div class="filter-label">
        <?php echo $form->labelEx($model,'style') . "\n"; ?>
        <?php //echo $form->dropDownList($model,'style', $style). "\n"; ?>
        <?php 
            if(Filter::getStyleId()) 
            {
                $options[Filter::getStyleId()]=array('selected'=>true);
            } else {
                $options[0] = array('selected'=>true);
            }
            echo CHtml::dropDownList('style', '', $style,array(
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('filter/style'),
                    //'update'=>'#'.CHtml::activeId($model,'genre'),
                    //'update'=>'#genre',
                    'success'=>'function(jdata){'
                                . 'var data = $.parseJSON(jdata);'
                                . 'jQuery("#genre").html(data.data);'
                            . '}',
                ),
                'options' => $options,
            )); 
            $options = null;
        ?>
        <?php echo $form->error($model,'style') . "\n"; ?>
    </div>
    <div class="filter-label">
        <?php echo $form->labelEx($model,'genre') . "\n"; ?>
        <?php //echo $form->dropDownList($model,'genre', $genre). "\n"; ?>
        <?php 
            if(Filter::getGenreId()) 
            {
                $options[Filter::getGenreId()]=array('selected'=>true);
            } else {
                $options[0] = array('selected'=>true);
            }
            echo CHtml::dropDownList('genre', '', $genre,array(
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('filter/genre'),
                    //'update'=>'#'.CHtml::activeId($model,'genre'),
                    //'update'=>'#style',
                    'success'=>'function(jdata){'
                                . 'var data = $.parseJSON(jdata);'
                                . 'jQuery("#style").html(data.data);' 
                            . '}',
                ),
                'options' => $options,
            )); 
            $options = null;
        ?>
        <?php echo $form->error($model,'genre') . "\n"; ?>
    </div>

    <div class="price-scroll">
        <h1>Квиткові ціни:</h1> 
        
        <input type="text" class="min" name="price_min" value="<?php echo Filter::getPriceMin(); ?>" />
        <input type="text" class="max" name="price_max" value="<?php echo Filter::getPriceMax(); ?>" />
<?php
   echo CHtml::ajaxSubmitButton ("OK",
               array('/filter/price'),
               array(
                   //'dataType'=>'json',
                   'type' => 'POST',
                   //'data' => array('id'=>'investment'),
                   'success'=>'function() {'                           
                               .'}',
               )
        );
 ?>
<?php
$this->widget('zii.widgets.jui.CJuiSliderInput', array(
    'name'=>'slider_range',
     
    'event'=>'change',
    'options'=>array(
        'values'=>Filter::getPrice(),// default selection
        'min'=>0, //minimum value for slider input
        'max'=>5000, // maximum value for slider input
        'animate'=>true,
        // on slider change event 
        'slide'=>'js:function(event,ui){'
            . 'if(ui.values[0] > ui.values[1]) {'
                . 'var intersect = ui.values[1];'
                . 'ui.values[1] = ui.values[0];'
                . 'ui.values[0] = intersect;'
            . '}'
            . '$(".price-scroll .min").val(ui.values[0]);'
            . '$(".price-scroll .max").val(ui.values[1]);'
        . '}',
    // slider css options
    'htmlOptions'=>array(
        'style'=>''
    ),
))); ?>
    </div>
    <div class="calendar">
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
    <div id="bottom-block" style="background: #777; color: #FFF;"></div>
    <?php   
    $this->endWidget(); ?>
</div>
<div class="events">
<?php echo $ajaxContent; ?>
</div>