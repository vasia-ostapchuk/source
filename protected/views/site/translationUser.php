<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ -->

 <div class="translation_user">
<aside>
    <p>Сутності</p>
    <?php
        echo CHtml::ajaxButton('Локейшени',
            CController::createUrl('/site/translate'),   
            array('dataType'=>'json',
                    'type' => 'post',
                    'data' => array ('table'=>'location'),
                    'success'=>"function(data) {
                                $('#content').html(data);
                            }",
                ),
            array( 'style'=>'height: 30px; width:250px; left:0px;',
                'id'=>'translate-location',
                //'live' => false
                 )
        );
        echo CHtml::ajaxButton('Типи',
            CController::createUrl('/site/translate'),
            array('dataType'=>'json',
                    'type' => 'post', 
                    'data' => array ('table'=>'type'),
                    'success'=>"function(data) {
                                $('#content').html(data);
                            }",
                ),
            array( 'style'=>'height: 30px; width:250px; left:0px;',
                'id'=>'translate-type',
                //'live' => false
                 )
        );
    ?>
</aside>
<article>
    <div class="language_buttons">
            <?php
        echo CHtml::ajaxlink('EN',
            CController::createUrl('/site/translate'),   
            array('dataType'=>'json',
                    'type' => 'post',
                    'data' => array (
                        'lan'=>'en',
                        'table'=>'location',
                    ),
                    'success'=>"function(data) {
                                $('#content').html(data);
                            }",
                ),
            array( 'style'=>'height: 30px; width:250px; left:0px;',
                'id'=>'translate-language_en',
                 )
        );
        echo CHtml::ajaxlink('UA',
            CController::createUrl('/site/translate'),   
            array('dataType'=>'json',
                    'type' => 'post',
                    'data' => array ('lan'=>'ua',
                        //'table'=>$parameters['table'],
                    ),
                    'success'=>"function(data) {
                                $('#content').html(data);
                            }",
                ),
            array( 'style'=>'height: 30px; width:250px; left:0px;',
                'id'=>'translate-language_ua',
                 )
        );
        echo CHtml::ajaxlink('PL',
            CController::createUrl('/site/translate'),   
            array('dataType'=>'json',
                    'type' => 'post',
                    'data' => array ('lan'=>'pl',
                       // 'table'=>$parameters['table'],
                    ),
                    'success'=>"function(data) {
                                $('#content').html(data);
                            }",
                ),
            array( 'style'=>'height: 30px; width:250px; left:0px;',
                'id'=>'translate-language_pl',
                 )
        );
        ?>
        <div class="lan">
            <ul id="nav">  
            <li><a href=""title="ua"><img src="../../../images/ua.jpg" /></a>  
            <ul>  
            <li class="uz"><a href=""title="pl"><img src="../../../images/pl.jpg" /></a> </li>  
            <li class="uz"><a href=""title="en"><img src="../../../images/en.jpg" /></a> </li>  
        </div>
    <div class="navigator-search">
        <form class="form-search" method="post" action="index.php?r=site/search">
            <input type="search" name="search" placeholder="пошук" value=""/>
            <input id="link" type="hidden" name ="id" value="google" />
            <input type="submit" value=""/>
        </form>
        <script>  
            $(document).ready(function(){ //відбувається після завантаження сторінки
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
     <div class="sorting">
         <span>Сортувати:</span>
         <li><a href="">Останніми змінами</a></li>
         <li><a href="">Алфавітом</a></li>
     </div>
     <div class="translator">   
        <?php
            if($row) {
        ?>
        <div>
            <h1>Переклад сутності: <?php echo $parameters['table']; ?>-><?php echo $parameters['column']; ?></h1>
        </div>
        <?php
            foreach ($row as $id=>$word) {
        ?>
        <fieldset class="field">
            <div>
                <legend>Стрічка для перекладу</legend>
            </div>
            <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'TranslateForm_'.$id,
                    'enableAjaxValidation'=>false,
                    'clientOptions'=>array(
                        'validateOnSubmit' => true,
                        'validateOnChange'=>false,
                        'validateOnType'=>false,
                    ),
                    'htmlOptions'=>array('class'=>'form', 'onsubmit'=>"js:function(){alert('submit_form');}"),
                    'action' => array('site/translate'),
                ));
                echo CHtml::textField('row'.$id,$word, array('class'=>'eng_word'));
                echo CHtml::textField('translate'.$id,'', array('placeholder'=>'translate','class'=>'translated'));
                echo CHtml::hiddenField('row_id'.$id,$id);
                echo CHtml::hiddenField('lan_id'.$id,2);
                
                echo CHtml::ajaxSubmitButton ("ОК",
                    array('/site/translate'),
                        array(
                            'type' => 'post',
                            'data' => array(
                                'table'=>$parameters['table'],
                                'row' => "js:$('#row$id').val()",
                                'translate' =>"js:$('#translate$id').val()",
                                'row_id' => $id,
                                'lan_id' => '2',
                            ),
                            'success'=>"function(data) {
                                            //alert(data);
                                        }",
                        ),
                        array('id'=>'translate-button_'.$id)
                );
                 $this->endWidget();
            ?>
        </fieldset>
             <?php } } ?>
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
</article>
</div>
        <script>  
            $(document).ready(function(){
                $('#translation_form').submit(function(e){
                    e.preventDefault();
                    var m_data=$(this).serialize();
                        $.ajax({
                        type: 'post',
                        url: '/index.php?r=site/translate',
                        data: m_data,
                        dataType: 'json',
                        success: function(data){
                            $('#content').html(data);
                        }
                    });
                });
            });
        </script>