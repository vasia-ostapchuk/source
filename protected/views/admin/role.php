<div id="content-role">    
    <div id="add-role">
            <button onclick="$('#addRoleModalForm').dialog('open');">Add</button>
    </div>
    <div id="role">
        <?php if(isset($data)) ?>
        <?php foreach ($data as $roleId => $value) { ?>
        <form class="role-form">
            <input type="text" value="<?php echo $value['alias']; ?>">
            <input type="text" value="<?php echo $value['module']; ?>">
            <select id="perssimisions-list">
                <?php if(!empty($value['permissions'])) foreach ($value['permissions'] as $key => $val){ ?>
                    <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                <?php } ?>
            </select>
            <div class="invisible">&nbsp;</div>
           <!-- <input class="button-perm" type="submit" value="Perm">
            <input class="button-del" type="submit" value="Del"> -->
            <?php echo CHtml::ajaxButton('Права',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'role_permission','id'=>$roleId),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'height: 35px; width:50px; margin: 0;',
                        'id'=>'role_perssimision-bnt'.$value['id'],
                        //'live' => false
                         )
                ); 
            ?>
            
            <?php echo CHtml::ajaxButton('Del',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'role','action'=>'delete-role','id'=>$roleId),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'height: 35px; width:30px; margin: 0;',
                        'id'=>'role_delete-bnt'.$value['id'],
                        //'live' => false
                         )
                ); 
            ?>
        </form>
        <?php } ?>
    </div>
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

