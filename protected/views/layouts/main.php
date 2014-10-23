<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/administration.css" />
        <!--<link href="../../../css/style.css" rel="stylesheet" type="text/css"></link>-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
     

<body>    
    <div class="container" id="page">
        <div class="header">
            <div class="logo">
                
            </div>
            <div class="lan">
              <ul id="nav">  
                  <li><a href=""title="ua"><img src="../../../images/ua.jpg" /></a>  
                    <ul>  
                        <li class="uz"><a href=""title="pl"><img src="../../../images/pl.jpg" /></a> </li>  
                        <li class="uz"><a href=""title="en"><img src="../../../images/en.jpg" /></a> </li>  
                    </ul>
              </ul>
            </div>
             
            <div class="user_reg_buttons">
            <?php echo $this->renderPartial('application.views.site.user_reg_buttons',array(),true); ?>
            </div>
            <?php require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'ModalWindows.php'); ?> <!--підключаєм файл з модальними вікнами ../layouts/filename-->
        </div>
        
        <div id="content">            
            <?php echo $content; ?>
        </div>
        
        <div class="footer">
            <h1 style="text-align:center;">FOOTER</h1>
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
                /*$location=Yii::app()->geoip->lookupLocation('209.85.135.104');// -- google
                //$location=Yii::app()->geoip->lookupLocation('178.212.111.36'); 
                echo "<pre>";
                print_r($location);
                echo "</pre>";
                echo "<br>";
                echo "Country: " . $location->countryName . "<br>";
                echo "Region: " . $location->regionName . "<br>";
                echo "City: " . $location->city . "<br>";
                echo "<pre>";
                var_dump($_SESSION);
                echo "</pre>";
                echo "<pre>";
                var_dump($_COOKIE);
                echo "</pre>";*/
            ?>
        </div>
        <?php 
            echo "<pre>";
            var_dump($_SESSION);
            echo 'id='.Yii::app()->user->id;
            echo "<br/>";
            //print_r(Yii::app()->user->user_role);
            echo "</pre>";
            echo "<pre>";
            var_dump($_COOKIE);
            echo "</pre>";
            
            /*echo "<pre>";
            var_export(Yii::app()->user);
            echo "</pre>";
            
            $model = new Location;
            echo "<pre>";
            //foreach 
            //error_log(var_dump($model->selectContry()->name));
            echo "</pre>";*/
        ?>
    </div>
    
</body>
</html>