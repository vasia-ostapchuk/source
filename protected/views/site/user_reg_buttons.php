<?php $this->widget('zii.widgets.CMenu', array(
'encodeLabel'=>false,
'items'=>array(
array(
'label'=>'<img src="/images/ua.jpg" />', 
'url'=>array('site/index'),
),
array( 
'label'=>'<img src="/images/pl.jpg" />', 
'url'=>array('site/index'),
),
array(
'label'=>'<img src="/images/en.jpg" />', 
'url'=>array('site/index'),
),
),
)); ?>

<?php if(Yii::app()->session['userdata']){ ?>
<label id="profile_label">  
<input class="button" id="profile_button" type="button" value="<?php echo Yii::app()->user->name; ?>" onclick="$('#ProfileMenu').dialog('open');" />   
</label>
    <br><a id="logout" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php?r=site/logout"  >вийти </a>
<?php } else {?>
    <input class="button" id="login_button" type="button" value="Вхід" title="Вхід" onclick="$('#loginModalForm').dialog('open');$('#loginModalForm').tabs({selected:0});" />
    <input class="button" id="reg_button" type="button" value="Реєстрація" title="Реєстрація" onclick="$('#loginModalForm').dialog('open');$('#loginModalForm').tabs({selected:1});" />
<?php } ?>