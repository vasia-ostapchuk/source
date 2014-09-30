<?php

 class TranslateAction extends CAction {
     
    
     
    public function run()
    {
        $this->controller->render('investment');
        $this->layout ='//layouts/chapters/DynamicTranslation';
    }
 }