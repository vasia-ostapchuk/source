<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ -->

 <div class="translation_user">
     <aside>

<button id="123">Тест</button>
<?php
                //3 неробочі кнопки
                echo CHtml::ajaxButton('Сутності',  
                    CController::createUrl('/site/translate'),
                    array('dataType'=>'json',
                            'type' => 'post', 
                            'data' => array ('name'=>'table'),
                            'success'=>"function(data) {
                                        //$('#content').html(data);
                                    }",
                        ),
                    array('style'=>'height: 30px; width:250px; left:0px;',
                        'id'=>'translate-table'
                         )
                );
                echo CHtml::ajaxButton('Локейшени',  
                    CController::createUrl('/site/translate'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('name'=>'location'),
                            'success'=>"function(data) {
                                alert(data);
                                        //$('#content').html(data);
                                    }",
                        ),
                    array( 'style'=>'height: 30px; width:250px; left:0px;',
                        'id'=>'translate-location'
                         )
                );
                echo CHtml::ajaxButton('Типи',  
                    CController::createUrl('/site/translate'),
                    array('dataType'=>'json',
                            'type' => 'post', 
                            'data' => array ('name'=>'type'),
                            'success'=>"function(data) {
                                        $('#content').html(data);
                                    }",
                        ),
                    array( 'style'=>'height: 30px; width:250px; left:0px;',
                        'id'=>'translate-type'
                         )
                );
            ?>
     </aside>
     <article>
         <div class="language_buttons">
             <button>EN</button>
             <button>UA</button>
             <button>PL</button>
             <button>Пошук</button>
             <span>місце на мову</span>
         </div>
         <div class="sorting">
             <span>Сортувати:</span>
             <button>Останніми змінами</button>
             <button>Алфавітом</button>
         </div>
         <div class="translator">    
             <form id="translation_form" method='post'>
                <?php if($row) foreach ($row as $id=>$word) { ?>
                    <fieldset class="field">
                        <div>
                            <legend>Стрічка для перекладу</legend>
                        </div>
                        <input class="eng_word" name="eng_word" value="<?php echo $word; ?>" >
                        <input class="translated">
                        <button id="translate-button" type="submit">Ok</button>
                    </fieldset>
                <?php } ?>
            </form>
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
                $('#123').click(function(){ //клік на кнопку тест
                    $.ajax({
                        type: 'post',
                        url: '/index.php?r=site/translate',
                        data: {name:'location'},
                        dataType: 'json',
                        success: function(data){
                            $('#content').html(data);
                        }
                    });
                });
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