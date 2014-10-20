<?php

class SiteController extends YiiController
{
    //public $layout='//layouts/chapters/Main';
    public $layout='//layouts/main';

    public function beforeAction($action) {
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
            'artist_edit'=>'application.controllers.actions.ArtistEditAction',
        );
    }
        
    public function actionAdministration()
    { 
        echo CJSON::encode($this->renderPartial('administration',array(),true));
        Yii::app()->end();
    }
    public function actionArtist()
    {
        $styles=new Style;
        $style=$styles->selectStyle();
        $genre=$styles->selectGenre(Filter::getStyleId());
        $model = new Image;
        echo CJSON::encode($this->renderPartial('artist',array('poster'=>$model, 'style'=>$style, 'genre'=>$genre),true));
        Yii::app()->end();
    }
    public function actionAnalitic()
    {
        $poster = new Image;
        echo CJSON::encode($this->renderPartial('analitic',array('poster'=>$poster),true));
        Yii::app()->end();
    }
    public function actionEvent()
    {
        echo CJSON::encode($this->renderPartial('event',  array(),true));
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