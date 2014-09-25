<?php

 class AjaxAction extends CAction {
    public function run()
    {
        error_log(print_r($_POST,true));
        if(Yii::app()->request->getPost('id') == 'calendar')
        {
            error_log(print_r($_POST,true));
            Yii::app()->end();
        } else {
            $view = Yii::app()->request->getPost('id');
            echo CJSON::encode($this->controller->renderPartial($view,array('parameters'=>Events::$even),true));
        }
    }
 }