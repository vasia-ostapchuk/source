<?php

class SiteController extends CController
{
    //public $layout='//layouts/chapters/Main';
    public $layout='//layouts/main';
	
    
	public function actions()
	{
                
            //Yii::app()->session->open();
		return array(
                        'index'=>'application.controllers.actions.IndexAction',
                        'error'=>'application.controllers.actions.ErrorAction',
                        'login'=>'application.controllers.actions.LoginAction',
                        'logout'=>'application.controllers.actions.LogoutAction',
                        'signup'=>'application.controllers.actions.SignUpAction',
                        'ajax'=>'application.controllers.actions.AjaxAction',
                        'search'=>'application.controllers.actions.SearchAction',
                        /*'filtercountry'=>'application.controllers.actions.FilterCountryAction',
                        'filterstyle'=>'application.controllers.actions.FilterStyleAction',
                        'filtergenre'=>'application.controllers.actions.FilterGenreAction',
                        'filtercity'=>'application.controllers.actions.FilterCityAction',*/
		);
	}
        
    public function actionTranslate()
    {   
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
        
        if(Yii::app()->request->getPost('name')) {
            $action = Yii::app()->request->getPost('name');
        }
        else 
            $action = 'location';
        if($action=='location')
            $row=Location::model()->selectAll();
        echo CJSON::encode($this->renderPartial('translationUser',array('row'=>$row),true, true));
           // Yii::app()->end();
    }  
    public function actionAdministration()
    {
            //$this->layout ='//layouts/chapters/Administration';  
        echo CJSON::encode($this->renderPartial('administration',array(),true));
        Yii::app()->end();
    }
}