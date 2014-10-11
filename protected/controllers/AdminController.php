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
class AdminController extends CController{
    public $layout='//layouts/main';
    
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
                    $role = new Role;
                    $one = $role->selectAll();
                    $obj = new Permission;
                    $data = $obj->selectAll();
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
