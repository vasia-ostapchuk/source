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
        $model = new TranslationForm;

        if(Yii::app()->request->getPost('row_id')) {
            $model->all();
            error_log('sdff');
        }
        
        
        if(Yii::app()->request->getPost('name')) {
            $action = Yii::app()->request->getPost('name');    
            //$model->row_id= Yii::app()->request->getPost('row_id');
            //$model->lan_id= Yii::app()->request->getPost('lan_id');    
        }
        else {
            $action = 'location';
        }
        $model->table= $action;
        switch ($action) {
            case 'location':
            $model->column= 'name';
            break;
        }
        $dbmodel = ucfirst($action);
        $row = $dbmodel::model()->selectAll();
        $parameters=array('table'=>$model->table, 'column'=>$model->column);
        echo CJSON::encode($this->renderPartial('translationUser',array('row'=>$row,'model'=>$model,'parameters'=>$parameters),true, true));
            //Yii::app()->end();
    }  
    public function actionAdministration()
    {
            //$this->layout ='//layouts/chapters/Administration';  
        echo CJSON::encode($this->renderPartial('administration',array(),true));
        Yii::app()->end();
    }
}