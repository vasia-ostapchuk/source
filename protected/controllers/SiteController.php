<?php

class SiteController extends YiiController
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
            'index'=>'application.controllers.site.IndexAction',
            'error'=>'application.controllers.site.ErrorAction',
            'login'=>'application.controllers.site.LoginAction',
            'logout'=>'application.controllers.site.LogoutAction',
            'signup'=>'application.controllers.site.SignUpAction',
            'ajax'=>'application.controllers.site.AjaxAction',
            'search'=>'application.controllers.site.SearchAction',
            'administration'=>'application.controllers.site.AdministrationAction',
            'artist_edit'=>'application.controllers.site.ArtistEditAction',
        );
    }
        
    public function actionAdministration()
    { 
        echo CJSON::encode($this->renderPartial('administration',array(),true, true));
        Yii::app()->end();
    }
    public function actionArtist()
    {
        $singer_id = 1;//сюди передати id виконавця
        $exist = false;
        if($singer_id) {
            $exist = Singer::model()->selectBySingerId($singer_id);
            //error_log(var_export($exist,1));
        }
        $model = new Image;
        //$user_id = Yii::app()->user->getId();        
        echo CJSON::encode($this->renderPartial('artist',array('poster'=>$model, /*'user_id'=>$user_id, */'singer_id'=>$singer_id, 'exist'=>$exist),true, true));
        Yii::app()->end();
    }
    public function actionAccessdeny()
    {
        $this->render('accessdeny');
    }
    public function actionAnalitic()
    {
        echo CJSON::encode($this->renderPartial('analitic',array(),true, true));
        Yii::app()->end();
    }
    public function actionEvent()
    {
        echo CJSON::encode($this->renderPartial('event',  array(),true, true));
        Yii::app()->end();
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