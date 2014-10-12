<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'addPermissionModalForm',
            'options' => array(
                'title' => 'Add new premission',
                'autoOpen' => false,
                'modal' => true,
                'show'=>array(
                    'effect'=>'blind',
                    'duration'=>500,
                ),
                'hide'=>array(
                    'effect'=>'blind',
                    'duration'=>500,
                ),
                'resizable'=> false,
                'position'=> "{ my=>'right top', at=>'left bottom'}",
            ),
        ));
?>

    <div class="modal-body">
        <?php
            $model = new AddPermissionForm;
            echo $this->renderPartial('application.views.admin.add_permission',array('model'=>$model),true);
        ?>
    </div>

<?php   
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'addRoleModalForm',
            'options' => array(
                'title' => 'Add new role',
                'autoOpen' => false,
                'modal' => true,
                'show'=>array(
                    'effect'=>'blind',
                    'duration'=>500,
                ),
                'hide'=>array(
                    'effect'=>'blind',
                    'duration'=>500,
                ),
                'resizable'=> false,
                'position'=> "{ my=>'right top', at=>'left bottom'}",
            ),
        ));
?>

    <div class="modal-body">
        <?php
            $model = new AddRoleForm;
            echo $this->renderPartial('application.views.admin.add_role',array('model'=>$model),true);
        ?>
    </div>

<?php   
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
