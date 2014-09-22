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
                <?php if(!Yii::app()->user->isGuest){ ?>
                    <input class="button" id="profile_button" type="button" value="профайл" onclick="" />
                    <a id="logout" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php?r=site/logout"  >Logout(<?php echo Yii::app()->user->name; ?>)</a> 

                <?php } else {?>
                    <input class="button" id="login_button" type="button" value="Вхід" onclick="$('#loginModalForm').dialog('open'); $('#loginModalForm').tabs({'selected':0}); return false;" />
                    <input class="button" id="reg_button" type="button" value="Реєстрація" onclick="$('#loginModalForm').dialog('open'); $('#loginModalForm').tabs({'selected':1}); return false;" />  
                <?php } ?>
        </div>
        <?php require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'authentication.php'); ?>
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
        <form class="form-search" method="get" action="/search" target="_blank">
<input type="text" name="q" placeholder="пошук" value=""/></form>
            </div>
        </div>
        <div id="content">            
            <?php echo $content; ?>
        </div>
      
        
        
        <div class="footer">
            то футер детка
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
            //var_export($model->select());
            echo "</pre>";
        ?>
    </div>
    
</body>
</html>