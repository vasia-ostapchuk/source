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
            <div class="login-registration">
                <?php if(!Yii::app()->user->isGuest){ ?>
                <p style="display: block; float: right; text-decoration: none;">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php?r=site/logout" >Logout(<?php echo Yii::app()->user->name; ?>)</a>
                </p>
                <?php } else {?>
                    <a href="#" onclick="$('#mydialog').dialog('open'); return false;" style="text-decoration: none;" > Login </a>
                <?php } ?>
            </div>
            <div class="login-registration">
                <a href="">Registration</a>
            </div>
        </div>
        <?php require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'modalForm.php'); ?>
        <div id="content">            
            <?php echo $content; ?>
        </div>
        <div class="footer">
            то футер детка
        </div>
    </div>
    
</body>
</html>