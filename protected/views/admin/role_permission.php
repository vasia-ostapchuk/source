<div id="role-perssimision-list">
    <?php if(isset($data)) ?>
        <?php /* */ 
            foreach ($data as $value){ ?>
            <div class="role-perssimision-check">
            <?php 
                echo CHtml::checkBox('premission'.$value['premId'], $value['check'], array(
                    'ajax' => array(
                            'type'=>'POST', //request type
                            'url'=>  CController::createUrl('admin/ajax'),
                            'dataType'=>'json',
                            'data' => array(
                                'view'=>'role_permission',
                                'action'=>'change-role',
                                'id'=>$value['id'],
                                'permissionId'=>$value['premId'],
                                'change'=>'js:function(e){ if($("#check'.$value['premId'].'").is(":checked")) return 1; else return 2;}',
                            ),
                            'before' => 'alert(1);',
                            'success' =>'function(jdata){
                                    /*var data = jQuery.parseJSON(jdata);*/
                                    /*alert(jdata.text);*/
                                    if($("#check'.$value['premId'].'").is(":checked"))
                                        $("#check'.$value['premId'].'").attr("checked", false);
                                    else
                                        $("#check'.$value['premId'].'").attr("checked", true);
                                    return false;
                            }',
                            'error'=>'function (xhr, ajaxOptions, thrownError){
                                    alert(xhr.statusText);
                                    alert(thrownError);}',
                    ),
                    //'onchange' => 'alert(1); return false;",
                    'prompt' => Yii::t('app','- select -'),
                    'id' => 'check'.$value['premId'],
                )); 
        
        ?>
        <label for="check<?php echo $value['premId']; ?>"><?php echo $value['alias']; ?></label>
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

