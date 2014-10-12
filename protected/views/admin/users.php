<div id="users">
    <!--<button>All users</button>-->
    <?php echo CHtml::ajaxButton('All users',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'users','action'=>'all'),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'width: 70px; height: 30px;',
                        'id'=>'all-users',
                        //'live' => false
                         )
                ); 
            ?>
    <!--<button>Users with roles</button>-->
    <?php echo CHtml::ajaxButton('Users with roles',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'users','action'=>'with-roles'),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'width: 100px; height: 30px;',
                        'id'=>'users-with-roles',
                        //'live' => false
                         )
                ); 
            ?>
    <br/>
    &nbsp;
    <?php if(isset($data)) ?>
    <?php foreach ($data as $key => $value) { ?>
    <div class="user-list">
        <form method="post">
            <span class="user-name"><?php echo $value['username']; ?></span>
            <select class="role-list">
                <?php if(isset($value['role_list'])){ ?>
                    <?php foreach ($value['role_list'] as $k=>$v){ ?>
                    <option value="<?php echo $k; ?>"><?php echo $v?></option>
                <?php } } ?>
            </select>
            <div id="invisible">&nbsp;</div>
            <!--<button class="role-bnt">Role</button>-->
            <?php echo CHtml::ajaxButton('Role',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'users_role','action'=>'user-role','userId'=>$value['id']),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'width:50px; height: 30px;',
                        'id'=>'users_role-bnt'.$key,
                        //'live' => false
                         )
                ); 
            ?>
        </form>
    </div>
    <?php } ?>
</div>
