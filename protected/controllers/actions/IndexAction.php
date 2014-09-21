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
     $this->controller->render('index');
    }
 }