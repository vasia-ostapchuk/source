<div id="role-perssimision-list">
    <?php for($i=0;$i<10;$i++) { ?>
    <div class="role-perssimision-check">
        <!--<input id="check<?//php echo $i; ?>" type="checkbox" value="<?//php echo ($i+1); ?>" onchange="">-->
        <?php echo CHtml::checkBox('recommenderType_'.$i, true, array(
                'ajax' => array(
                        'type'=>'POST', //request type
                        'url'=>  CController::createUrl('admin/ajax'),
                        'dataType'=>'json',
                        'data' => array('view'=>''),
                        'success' =>"function(jdata){
                                /*var data = jQuery.parseJSON(jdata);*/
                                /*alert(jdata.text);*/
                                if($(this).is('checked')) 
                                    $(this).removeAttr('checked');
                                else 
                                    $(this).attr('checked','checked');
                                jQuery(this).prop('checked', true);
                                return false;
                        }",
                        'error'=>'function (xhr, ajaxOptions, thrownError){
                                alert(xhr.statusText);
                                alert(thrownError);}',
                ),
                'onchange' => "alert(1);",
                'prompt' => Yii::t('app','- select -'),
                'id' => 'check'.$i,
            )); 
        ?>
        <label for="check<?php echo $i; ?>">Perssimision <?php echo $i; ?></label>
    </div>
    <?php } ?>
    
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

