<?php

 class AjaxAction extends CAction {
    public function run()
    {
        $view = Yii::app()->request->getPost('id');
            echo CJSON::encode($this->controller->renderPartial($view,array('parameters'=>Events::$even),true));
    }
 }