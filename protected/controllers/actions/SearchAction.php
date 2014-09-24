<?php

 class SearchAction extends CAction {
    public function run()
    {
        $view = Yii::app()->request->getPost('id');
        $search = Yii::app()->request->getPost('search');
        if($view == 'google') {
            echo CJSON::encode('<h1> Ви шукали :'.$search.'</h1>');
        }
        //echo CJSON::encode($this->controller->renderPartial($view,array(),true));
    }
 }