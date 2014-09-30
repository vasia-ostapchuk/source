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
            //$this->render('investment');
           // $this->layout ='//layouts/chapters/DynamicTranslation';
        echo CJSON::encode($this->renderPartial('investment',array(),true));
    }  
    public function actionAdministration()
    {
            //$this->layout ='//layouts/chapters/Administration';  
        echo CJSON::encode($this->renderPartial('administration',array(),true));
        
    }
}