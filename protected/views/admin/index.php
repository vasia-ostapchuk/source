<head>
        
</head>
<body>
    <div class="administration">
        <aside>
            <!--<button>Права</button>
            <button>Ролі</button>
            <button>Користувачі</button>-->
            <?php echo CHtml::ajaxButton('Права',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'permission'),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'height: 50px; width:250px; left:0px; font-size:14pt;',
                        'id'=>'perssimision-bnt',
                        //'live' => false
                         )
                );
            ?>
            <?php echo CHtml::ajaxButton('Ролі',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'role'),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'height: 50px; width:250px; left:0px; font-size:14pt;',
                        'id'=>'role-bnt',
                        //'live' => false
                         )
                ); 
            ?>
            <?php echo CHtml::ajaxButton('Користувачі',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'users'),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'height: 50px; width:250px; left:0px; font-size:14pt;',
                        'id'=>'users-bnt',
                        //'live' => false
                         )
                ); 
            ?>
        </aside>
        <?php echo $this->renderPartial('application.views.admin.modal_form',array(),true); ?>
        <div id="content-admin">
            <?php echo $ajaxContent; ?>
        </div>
    </div>
</body>


