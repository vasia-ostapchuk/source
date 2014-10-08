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
            CController::createUrl('/site/viewtranslate'),   
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
            CController::createUrl('/site/viewtranslate'),
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
            CController::createUrl('/site/viewtranslate'),   
            array('dataType'=>'json',
                    'type' => 'post',
                    'data' => array (
                        'lan_id'=>'2',
                        'table'=>$table,
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
            CController::createUrl('/site/viewtranslate'),   
            array('dataType'=>'json',
                    'type' => 'post',
                    'data' => array ('lan_id'=>'1',
                        'table'=>$table,
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
            CController::createUrl('/site/viewtranslate'),   
            array('dataType'=>'json',
                    'type' => 'post',
                    'data' => array ('lan_id'=>'3',
                        'table'=>$table,
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
                </ul>
          </ul>
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
            <h1>Переклад сутності: <?php echo $table; ?>-><?php echo $column; ?></h1>
        </div>
        <?php
            foreach ($row as $id=>$value) {
                if(is_numeric($id)) {
            $tr_id = $value['translate_id'];        
        ?>
            <fieldset class="field">
                <div>
                    <legend>Стрічка для перекладу</legend>
                </div>
                <?php
                    echo CHtml::textField('row_'.$id, $value['name'], array('class'=>'eng_word'));
                    echo CHtml::textField('translate_'.$id, $value['translate'], array('placeholder'=>'translate','class'=>'translated'));
                    echo CHtml::hiddenField('tr_id_'.$id, $tr_id);
                ?>
            </fieldset>
            <?php } } }?>
    </div>
</article>
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
</div>
<script>  
    $(document).ready(function(){

        $('.field').on('keypress', function(e) {
            if(e.keyCode == 13) {
                var full_id = $(e.target).attr("id");
                var id = full_id;
                if(full_id.search('row') != -1) {
                    id = full_id.substr(4);
                }
                else {
                    id = full_id.substr(10);                            
                }
                submitTranslate(id);
            }
        });

        function submitTranslate(id){
            var tdata = {
                table:'<?php echo $table; ?>',
                row: $('#row_'+id).val(),
                translate: $('#translate_'+id).val(),
                row_id: id,
                tr_id: $('#tr_id_'+id).val(),
                subject: '<?php echo $column; ?>',
                lan_id: 2
            };
            //console.log(tdata['row']);
            /*if(tdata['row'] == '') {
                redBorder('#row_'+id);
                return;    
            }*/
            if(tdata['translate'] == '') {
                redBorder('#translate_'+id);
                return;    
            }
            if($('#translate_'+id).attr('box-shadow') || $('#translate_'+id).attr('webkit-box-shadow') || $('#translate_'+id).attr('moz-box-shadow'))
                $('#translate_'+id).removeAttr('style');//.removeAttr('webkit-box-shadow').removeAttr('moz-box-shadow');
            $.ajax({
                url: 'index.php?r=site/translate',
                dataType: 'json',
                data: tdata,
                type: 'POST',
                success: function(data){
                    $('#tr_id_'+id).val(data.tr_id);
                }
                });
        };
        function redBorder(selector) {
            $(selector).css('box-shadow','0 0 15px rgba(255, 0, 0, 1)');
            $(selector).css('-webkit-box-shadow','0 0 15px rgba(255, 0, 0, 1)');
            $(selector).css('-moz-box-shadow','0 0 15px rgba(255, 0, 0, 1)');
        }
    });
</script>