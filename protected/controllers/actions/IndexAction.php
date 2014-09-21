<?php

 class IndexAction extends CAction {
    public function run()
    {
        //$this->render('index');
        //$this->runWithParams();
       /* return array(
            'render',
            array('index'),
        );*/
        $data = array();
        $data["ajaxContent"] = $this->controller->renderPartial('poster',array(),true);
        
     $this->controller->render('index', $data);
    }
 }