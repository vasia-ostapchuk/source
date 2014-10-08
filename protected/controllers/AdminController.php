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
        if($view == 'index'){
            //$this->redirect(array('admin/index'));  
            $ajaxContent=$this->renderPartial('perssimision',array(),true);
            echo CJSON::encode($this->renderPartial($view,array('ajaxContent'=>$ajaxContent),true,true));
            Yii::app()->end();
        }elseif(!empty($view)){
            echo CJSON::encode($this->renderPartial($view,array(),true,true));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array('text'=>'hi','val'=>1));
            Yii::app()->end();
        }
    }
    
}
