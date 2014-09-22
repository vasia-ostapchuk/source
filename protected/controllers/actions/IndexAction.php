<?php

 class IndexAction extends CAction {
    public function run()
    {
        
        $data = array();
        $data["ajaxContent"] = $this->controller->renderPartial('poster',array(),true);
        
     $this->controller->render('index', $data);
    }
 }