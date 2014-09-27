<?php

 class AjaxAction extends CAction {
    public function run()
    {
            $view = Yii::app()->request->getPost('id');
            if($view=='poster'){
                $event = Events::$even;
                if(Filter::getSortByDate()){
                    usort($event, "Events::sortByDate");
                } elseif(Filter::getSortByPopularity()) {
                    usort($event, "Events::sortByPopularity");
                }
                echo CJSON::encode($this->controller->renderPartial($view,array('parameters'=>$event),true));
            } else {
                echo CJSON::encode($this->controller->renderPartial($view,array('parameters'=>Events::$even),true));
            }
    }
 }