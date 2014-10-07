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
    
    public function actionIndex(){
        $data['ajaxContent']=$this->renderPartial('users',array(),true);
        $this->render('index',$data);
    }
    
}
