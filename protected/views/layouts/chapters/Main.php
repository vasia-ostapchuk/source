<!--шаблон для головного розділу-->
<?php $this->beginContent('//layouts/main'); ?>


     <div class="navigator">
            <div class="navigator-button">
                <ul>
                    <li>
                        <?php
                            echo CHtml::ajaxButton('Афіша',  
                            CController::createUrl('/site/ajax'),   
                            array('dataType'=>'json',
                                    'type' => 'post', 
                                    'update' => '.events',
                                    'data' => array ('id'=>'poster'),
                                    'success'=>"function(data) {
                                                $('.events').html(data);
                                            }",
                                ),
                            array('class'=>'button',
                                 'style'=>'float:left; left:20px;'
                                 )
                            );
                        ?>
                    </li>
                    <li>
                        <?php
                            echo CHtml::ajaxButton('Інвестиції',  
                                CController::createUrl('/site/ajax'),   
                                array('dataType'=>'json',
                                    'type' => 'post', 
                                    'update' => '.events',
                                    'data' => array ('id'=>'investment'),
                                    'success'=>"function(data) {
                                                $('.events').html(data);
                                            }",
                                ),
                                array('class'=>'button',
                                    'type' => 'submit',
                                     'style'=>'float:left; left:40px;'
                                )
                            );
                        ?>                        
                    </li>
                    <li>
                        <?php
                            echo CHtml::ajaxButton('В процесі',
                            CController::createUrl('/site/ajax'),   
                            array('dataType'=>'json',
                                    'type' => 'post', 
                                    'update' => '.events',
                                    'data' => array ('id'=>'process'),
                                    'success'=>"function(data) {
                                                $('.events').html(data);
                                            }",
                                ),
                            array('class'=>'button',
                                 'style'=>'float:left; left:60px;'
                                 )
                            );
                        ?> 
                    </li>
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


	<?php echo $content; ?>
<?php $this->endContent(); ?>