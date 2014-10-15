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
                'viewtranslate'=>'application.controllers.actions.ViewTranslateAction',
                'translate'=>'application.controllers.actions.TranslateAction',
                'artist'=>'application.controllers.actions.ArtistAction',
            );
	}
        
    public function actionAdministration()
    { 
        echo CJSON::encode($this->renderPartial('administration',array(),true));
        Yii::app()->end();
    }
    public function actionArtist()
    {
        $model = new Singer;
        echo CJSON::encode($this->renderPartial('artist',array('model'=>$model),true));
        Yii::app()->end();
    }
    public function actionEvent()
    {
        echo CJSON::encode($this->renderPartial('event',  array(),true));
        Yii::app()->end();
    }
}