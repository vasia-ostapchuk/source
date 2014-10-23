<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YiiController
 *
 * @author Mr White
 */
class YiiController extends CController{
   
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    
    public function beforeAction($action) {
        $controller = Yii::app()->controller->id;
        return $this->controllAccess($action,$controller);
        return false;
    }
     
    public function controllAccess($action,$controller){
        if(isset(Yii::app()->user->user_permission)){ // Якщо юзер залогований 
            $permissions = Yii::app()->user->user_permission; 
        }else { // якщо юзер не залогований
            error_log('read database');
            $permissions = User::model()->selectPermissionsByName();
        }
        $actions = $permissions[$controller];
        if(!empty($actions) && in_array($action->id, $actions)){
            return true;
        }
        /*if($controller == 'site' && $action->id == 'logout') return true;*/
        return FALSE;
    }
    public function accessRules()
    {
        return array();
    }
}