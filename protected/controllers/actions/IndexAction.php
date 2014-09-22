<?php

 class IndexAction extends CAction {
    public function run()
    {
        
        $data = array();
        $data['ajaxContent'] = $this->controller->renderPartial('poster',array(),true);
        $model = new Location;
            /*echo "<pre>";
            //foreach 
            var_dump($model->selectContry());
            echo "</pre>";*/
            //Yii::app()->end();
        $data['country'] = $model->selectContry();
        $data['city'] = array();
     $this->controller->render('index', $data);
    }
 }