<?php

 class AjaxAction extends CAction {
    public function run()
    {
        if(Yii::app()->request->getPost('id') == 'calendar')
        {
            //error_log(print_r($_POST,true));
            //Yii::app()->end();
            echo 'text: ' . yii::app()->request->getPost('one');
        } else {
            $view = Yii::app()->request->getPost('id');
            echo CJSON::encode($this->controller->renderPartial($view,array('parameters'=>Events::$even),true));
        }
    }
 }