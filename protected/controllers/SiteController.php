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
        $model->object= $table;
        
        if(Yii::app()->request->getPost('row_id')) {

                $exist = $model->findByPk(Yii::app()->request->getPost('tr_id'));
                if($exist) {
                    $model = $exist;
                }
            $model->subject= Yii::app()->request->getPost('subject');
            $model->row_id= Yii::app()->request->getPost('row_id');
            $model->lan_id= Yii::app()->request->getPost('lan_id');
            $model->translate= Yii::app()->request->getPost('translate'); 
            
            if($lastId = $model->Add())
            {
             
                echo CJSON::encode(array(
                              'status'=>'success',
                              'tr_id' =>$lastId
                         ));
            }
            else {
                echo CJSON::encode(array(
                              'status'=>'error',
                         ));
            }
            Yii::app()->end();
        }
  
        
        $lan_id = 2;
        $dbmodel = ucfirst($table);
        $row = $dbmodel::model()->selectAll();  
        $translateRow = Translation::model()->select($model->object, $row['subject'][0], $lan_id);

        foreach($row as $k=>$r) {
            $row[$k]['translate'] = isset($translateRow[$k]) ? $translateRow[$k]['translate'] : '';
            $row[$k]['translate_id'] = isset($translateRow[$k]) ? $translateRow[$k]['id'] : '';
        }
        
        // error_log(var_export($row,1));
        $parameters=array('table'=>$model->object, 'column'=>$row['subject'][0]);
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