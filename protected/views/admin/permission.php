<div id="content-perssimisions">    
    <div id="add-presimision">
        <button onclick="$('#addPermissionModalForm').dialog('open');">Add</button>
    </div>
    <div id="perssimisions">
        <?php if(isset($data)) ?>
        <?php foreach($data as $value) { ?>
        <form class="perssimisions-form">
            <input type="text" value="<?php echo $value['alias']; ?>">
            <input type="text" value="<?php echo $value['module']; ?>">
            <input type="text" value="<?php echo $value['action']; ?>">
            <div class="invisible">&nbsp;</div>
            <!--<input class="button-del" type="submit" value="Del">-->
            <?php echo CHtml::ajaxButton('Del',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'permission', 'action'=>'delete-permission', 'id'=>$value['id']),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( /*'style'=>'height: 50px; width:250px; left:0px; font-size:14pt;',*/
                        'class'=>'button-del',
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
