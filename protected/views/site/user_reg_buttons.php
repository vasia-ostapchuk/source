<?php if(Yii::app()->session['userdata']){ ?>
    <input class="button" id="profile_button" type="button" value="профайл" onclick="" />
    <h3><?php echo Yii::app()->user->name; ?></h3>
    <a id="logout" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php?r=site/logout"  >вийти </a> 
<?php } else {?>
    <input class="button" id="login_button" type="button" value="Вхід" onclick="$('#loginModalForm').dialog('open');$('#loginModalForm').tabs({selected:0});" />
    <input class="button" id="reg_button" type="button" value="Реєстрація" onclick="$('#loginModalForm').dialog('open');$('#loginModalForm').tabs({selected:1});" />
<?php }?>