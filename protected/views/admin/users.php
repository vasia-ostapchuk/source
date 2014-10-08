<div id="users">
    <button>All users</button>
    <button>Users with roles</button>
    <br/>
    &nbsp;
    <?php for($i=0;$i<10;$i++) { ?>
    <div class="user-list">
        <form method="post">
            <span class="user-name">User</span>
            <select class="role-list">
                <option value="0">All roles</option>
            </select>
            <div id="invisible">&nbsp;</div>
            <!--<button class="role-bnt">Role</button>-->
            <?php echo CHtml::ajaxButton('Ролі',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'users_role'),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'width:50px; height: 30px;',
                        'id'=>'users_role-bnt',
                        //'live' => false
                         )
                ); 
            ?>
        </form>
    </div>
    <?php } ?>
</div>
