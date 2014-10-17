<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author Mr White
 */
class AdminController extends YiiController{
    public $layout='//layouts/main';
    
    public function beforeAction($action) {
        return parent::beforeAction($action);        
    }


    public function actions(){
        return array();
    }
    
    /*public function actionIndex(){
        $data['ajaxContent']=$this->renderPartial('perssimision',array(),true);
        $this->render('index',$data);
    }*/
    
    public function actionAjax(){
        
        CHtml::$liveEvents = false;
        if (Yii::app()->request->isAjaxRequest) {
		Yii::app()->getClientScript()->scriptMap = array(
			'jquery.js' => false,
			'jquery.min.js' => false,
			'jquery-ui.min.js' => false,
                        'jquery-ui.css' => false,
			'jquery.ba-bbq.js'=>false,
			'jquery.yiigridview.js'=>false,
		);
	}
        
        $view = Yii::app()->request->getPost('view');
        if($view == 'index'){ // переше завантаження сторінки адміністрування
            
            // завантаження прав зазамовчуванням тому підтягуємо дані із таблиці permission
            $obj = new Permission;
            $data = $obj->selectAll();
            $ajaxContent=$this->renderPartial('permission',array('data'=>$data),true);
            echo CJSON::encode($this->renderPartial($view,array('ajaxContent'=>$ajaxContent),true,true));
            Yii::app()->end();
            
        }elseif(!empty($view)){
            $data = array();
            switch ($view){
                case 'permission':
                    $obj = new Permission;
                    $action = Yii::app()->request->getPost('action');
                    if(!empty($action) && $action == 'delete-permission'){                        
                        $obj->deleteById(Yii::app()->request->getPost('id'));
                    } elseif(!empty($action) && $action == 'add-permission'){
                        //error_log('request: '.print_r(Yii::app()->request->getPost('AddPermissionForm'),true));
                        $postData = Yii::app()->request->getPost('AddPermissionForm');
                        $obj->module = $postData['module'];
                        $obj->action = $postData['action'];
                        $obj->alias = $postData['alias'];
                        $obj->add();
                    }
                    $data = $obj->selectAll();
                    break;
                case 'role':
                    $role = new Role;
                    $action = Yii::app()->request->getPost('action');
                    if(!empty($action) && $action == 'delete-role'){
                        //$role->deleteByPk(Yii::app()->request->getPost('id'));
                        $role->deleteRole(Yii::app()->request->getPost('id'));
                    } elseif(!empty($action) && $action == 'add-role'){
                        $postData = Yii::app()->request->getPost('AddRoleForm');
                        $role->name = $postData['module'];
                        $role->alias = $postData['alias'];
                        $role->add();
                    }
                    $data = $role->selectAll();
                    break;
                case 'role_permission':
                    $role = new Role;
                    $id = Yii::app()->request->getPost('id');
                    $action = Yii::app()->request->getPost('action');
                    
                    if(!empty($action) && $action == 'change-role'){
                        $permissionId = Yii::app()->request->getPost('permissionId');
                        $change = Yii::app()->request->getPost('change');
                        $role->changeRole($id, $permissionId,$change);
                        break;
                    } else
                        $data = $role->selectPremissionByRole($id);
                    break;
                case 'users':
                    $user = new User;
                    $action = Yii::app()->request->getPost('action');
                    if(empty($action) || $action == 'all'){
                        $data = $user->selectAllUsers();
                    } elseif($action == 'with-roles'){
                        $data = $user->selectAllUsersWithRole();
                    }
                    break;
                case 'users_role':
                    $user = new User;
                    $action = Yii::app()->request->getPost('action');
                    $userId = Yii::app()->request->getPost('userId');
                    $roleId = Yii::app()->request->getPost('roleId');
                    $change = Yii::app()->request->getPost('change');
                    if($action == 'add-role-by-user'){
                        $user->addRoleByUsers($userId,$roleId,$change);
                    } else {
                        $data = $user->selectRoleByUser($userId);
                    }
                    break;
            }
            echo CJSON::encode($this->renderPartial($view,array('data'=>$data),true,true));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array('text'=>'hi','val'=>1));
            Yii::app()->end();
        }
    }
    
}
