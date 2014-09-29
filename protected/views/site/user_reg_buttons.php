<label id="language_label" title="мови"> 
<?php echo CHtml::dropDownList('language_selector', 'language_selector', 
            array('eu ' => 'eu', 'uk' => 'uk', 'pl' => 'pl'),
            array('class' => 'language')
        );
?>
</label>

<?php if(Yii::app()->session['userdata']){ ?>
<label id="profile_label">  
<input class="button" id="profile_button" type="button" value="<?php echo Yii::app()->user->name; ?>" onclick="$('#ProfileMenu').dialog('open');" />   
</label>
    <br><a id="logout" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php?r=site/logout"  >вийти </a>
<?php } else {?>
    <input class="button" id="login_button" type="button" value="Вхід" title="Вхід" onclick="$('#loginModalForm').dialog('open');$('#loginModalForm').tabs({selected:0});" />
    <input class="button" id="reg_button" type="button" value="Реєстрація" title="Реєстрація" onclick="$('#loginModalForm').dialog('open');$('#loginModalForm').tabs({selected:1});" />
<?php } ?>