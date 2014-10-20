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
        //Текущий контроллер
       // echo Yii::app()->controller->id;
        //Текущий экшн
        //echo Yii::app()->controller->action->id;
        //error_log('action='.print_r($this->actions(),1));
        //error_log('accesControl');
        return array(
            'accessControl',
        );
    }
    
    public function beforeAction($action) {
        /*parent::beforeAction($action);*/
        //error_log('controller= '.Yii::app()->controller->id);
        //error_log('user id= '.Yii::app()->user->id);
        $controller = Yii::app()->controller->id;
        
        switch ($controller){
            case 'site':
                    return $this->controllAccess($action,'site');
                break;
            case 'admin':
                    return $this->controllAccess($action, 'admin');
                break;
        }
       // return true;
    }
     
    public function controllAccess($action,$controller){
        $flagAction = FALSE;
        $flagRole = FALSE;
        $arrayAction = array();
        $access = $this->accessRules();
        $userRole = User::model()->selectRole(Yii::app()->user->id); 
        // Якщо ролей не знайдено в БД то юзер стає автоматично гостем 
        if(empty($userRole)){
            //error_log('EMPTY');
            $userRole = array('Guest');
        }        
        //$userRole = isset(Yii::app()->user->user_role) ? Yii::app()->user->user_role : array('Guest');
        foreach ($access as $key=>$value){
            $arrayAction = array_merge_recursive($arrayAction,$value['actions']); 
            //error_log('arrayAction ' .implode(',', $arrayAction));
            if(in_array($action->id, $arrayAction)){
                $flagAction = TRUE;
                //error_log(1 . ' ' . $key);
            }  else {
                $flagAction = FALSE;
                continue;
            }
            if($controller == $value[0]){
                if(count($value['roles']) == 1){
                    //error_log(2 . ' ' . $key);
                    if(in_array($value['roles'][0], $userRole) && $flagAction){
                       // error_log($value['roles'][0]);
                        //error_log(3 . ' ' . $key);
                        return TRUE;
                    }else{
                        //error_log($value['roles'][0]);
                        $flagRole = FALSE;
                        //error_log(4 . ' ' . $key);
                        continue;
                    }
                }else{
                    foreach ($value['roles'] as $role){
                        //error_log(5 . ' ' . $key);
                        if(in_array($role,$userRole)){
                           // error_log(6 . ' ' . $key);
                            return TRUE;
                        }
                    }
                }
            }
        }
        return FALSE;
    }

    public function accessRules()
    {
        // ієрархія ролей відбувається зверху до низу 
        // кожній ролі прикріплений контроллер 
        return array(
            array(
                'site',
                'actions'=>array('index','login','signup','ajax','search','error','analitic'),
                'roles'=>array('Guest'),
            ),
            array(
                'site',
                'actions'=>array('logout','ajax'),
                'roles'=>array('User'),
            ),
            array(
                'site',
                'actions'=>array('artist','event','artist_edit', 'analitic'),
                'roles'=>array('Artist'),
            ),
            array(
                'site',
                'actions'=>array(),
                'roles'=>array('Moderator'),
            ),
            array(
                'site',
                'actions'=>array('translate','viewtranslate'),
                'roles'=>array('Transliter'),
            ),            
            array(
                'admin',
                'actions'=>array('ajax'),
                'roles'=>array('Admin'),
            ),
         );
    }
}