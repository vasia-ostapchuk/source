<?php

class TranslationController extends YiiController
{
    //public $layout='//layouts/chapters/Main';
    public $layout='//layouts/main';

    public function beforeAction($action) {
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
        return parent::beforeAction($action);
    }


    /*public function accessRules() {
        return array(
            parent::accessRules()[0],
            array(
                'allow',
                'actions'=>array('login','singup'),
                'roles'=>array('all'),
            )
        );
    }*/

    public function actions()
    {
        return array(
            'viewtranslate'=>'application.controllers.translation.ViewTranslateAction',
            'translate'=>'application.controllers.translation.TranslateAction',
        );
    }
    
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}