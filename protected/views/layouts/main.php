<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link href="../../../css/style.css" rel="stylesheet" type="text/css"></link>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
     
    
<body>

    <div class="container" id="page">
        <div class="header">
            
         
            <div class="logo">
                
            </div>
            <div class="user_reg_buttons">
            <?php echo $this->renderPartial('user_reg_buttons',array(),true); ?>
            </div>
        </div>
        <?php require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'ModalWindows.php'); ?> <!--підключаєм файл з модальними вікнами ../layouts/filename-->
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
        $(document).ready(function(){
            $('.form-search').submit(function(e){
            e.preventDefault();
            var m_method=$(this).attr('method');
            var m_action=$(this).attr('action');
            var m_data=$(this).serialize();
                $.ajax({
                    type: m_method,
                    url: m_action,
                    data: m_data,
                    dataType: "json",
                    success: function(data){
                        $('.events').html(data);
                    }
                });
            });
        });
    </script>
</div>
        </div>
        <div id="content">            
            <?php echo $content; ?>
        </div>
      
        
        
        <div class="footer">
            то футер детка
            <br/>
            <a id="click-me" href="#">Click me</a>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#click-me').click(function(e){
                            //alert('city is change ');
                            e.preventDefault();
                            var rdata = {id:'process'};
                            $.ajax({
                                type: 'POST',
                                url: 'index.php?r=site/ajax',
                                data: rdata,
                                dataType: 'json',
                                success: function(data){
                                    $('.events').html(data);
                                }
                            });
                        });
                    });
                </script>
            <br/>
            <?php 
                //$location=Yii::app()->geoip->lookupLocation('209.85.135.104');// -- google
                $location=Yii::app()->geoip->lookupLocation('178.212.111.36'); 
                /*echo "<pre>";
                print_r($location);
                echo "</pre>";*/
                echo "<br>";
                echo "Country: " . $location->countryName . "<br>";
                echo "Region: " . $location->regionName . "<br>";
                echo "City: " . $location->city . "<br>";
                echo "<pre>";
                var_dump($_SESSION);
                echo "</pre>";
                echo "<pre>";
                var_dump($_COOKIE);
                echo "</pre>";
            ?>
        </div>
        <?php 
            /*echo "<pre>";
            var_dump($_SESSION);
            echo "</pre>";
            
            echo "<pre>";
            var_dump($_COOKIE);
            echo "</pre>";
            
            echo "<pre>";
            var_export(Yii::app()->user);
            echo "</pre>";*/
            
            $model = new Location;
            echo "<pre>";
            //foreach 
            //error_log(var_dump($model->selectContry()->name));
            echo "</pre>";
        ?>
    </div>
    
</body>
</html>