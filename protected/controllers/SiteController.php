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
                        'administration'=>'application.controllers.actions.AdministrationAction',
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
        $model = new Translation;
        if(Yii::app()->request->getPost('table')) {
            $table = Yii::app()->request->getPost('table'); 
        }
        else {
            $table = 'location';
        }  
        $model->table= $table;
        switch ($table) {
            case 'location':
                $model->column= 'name';
            break;
            case 'type':
                $model->column= 'name';
            break;
        }
        if(Yii::app()->request->getPost('row_id')) {
            $is_new = Yii::app()->request->getPost('is_new');
            $model->row_id= Yii::app()->request->getPost('row_id');
            $model->lan_id= Yii::app()->request->getPost('lan_id');
            $model->translate= Yii::app()->request->getPost('translate');            
            if($model->validate() && $model->Add())
            {
                echo CJSON::encode(array(
                              'status'=>'success',
                         ));
            }
            else {
                echo CJSON::encode(array(
                              'status'=>'error',
                         ));
            }
            Yii::app()->end();
        }
        if(!Yii::app()->request->getPost('lan')) {
            $language = 'uk';
        }
        else {
            $language = Yii::app()->request->getPost('lan');
        }
        if($language == 'uk') {
            $dbmodel = ucfirst($table);
            $row = $dbmodel::model()->selectAll();  
        }
        else {
            $lan_id = Language::model()->selectLanId($language);
            $row = Translation::model()->select($model->table, $model->column, $lan_id->id);
        }
        $parameters=array('table'=>$model->table, 'column'=>$model->column);
        echo CJSON::encode($this->renderPartial('translationUser',array('row'=>$row,'model'=>$model,'parameters'=>$parameters),true, true));
        Yii::app()->end();
    }
    public function actionAdministration()
    {
            //$this->layout ='//layouts/chapters/Administration';  
        echo CJSON::encode($this->renderPartial('administration',array(),true));
        Yii::app()->end();
    }
    public function actionArtist()
    {
            //$this->layout ='//layouts/chapters/Administration';  
        echo CJSON::encode($this->renderPartial('artist',array(),true));
        Yii::app()->end();
    }
}