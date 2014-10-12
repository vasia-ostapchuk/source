<div id="users-role-list">
    <?php if(isset($data)){ ?>
    <?php foreach ($data as $key => $value) { ?>
    <div class="users-role-check">
        <?php 
                echo CHtml::checkBox('premission'.$key, $value['check'], array(
                    'ajax' => array(
                            'type'=>'POST', //request type
                            'url'=>  CController::createUrl('admin/ajax'),
                            'dataType'=>'json',
                            'data' => array(
                                'view'=>'users_role',
                                'action'=>'add-role-by-user',
                                'userId'=>$value['userId'],
                                'roleId'=>$key,
                                'change'=>'js:function(e){ if($("#role'.$key.'").is(":checked")) return 1; else return 2;}',
                            ),
                            'before' => 'alert(1);',
                            'success' =>'function(jdata){
                                    /*var data = jQuery.parseJSON(jdata);*/
                                    /*alert(jdata.text);*/
                                    if($("#role'.$key.'").is(":checked"))
                                        $("#role'.$key.'").attr("checked", false);
                                    else
                                        $("#role'.$key.'").attr("checked", true);
                                    return false;
                            }',
                            'error'=>'function (xhr, ajaxOptions, thrownError){
                                    alert(xhr.statusText);
                                    alert(thrownError);}',
                    ),
                    //'onchange' => 'alert(1); return false;",
                    'prompt' => Yii::t('app','- select -'),
                    'id' => 'role'.$key,
                )); 
        
        ?>
        <label for="role<?php echo $key; ?>"><?php echo $value['name']; ?></label>
    </div>
    <?php }} ?>
</div>