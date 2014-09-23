<?php

 class IndexAction extends CAction {
    public function run()
    {
        
        $data = array();
        $data['ajaxContent'] = $this->controller->renderPartial('poster',array(),true);
        $location=new Location;
        $style=new Style;
            /*echo "<pre>";
            //foreach 
            var_dump($location->selectContry());
           // $model = $style->select();
            //$list = CHtml::listData($model, 'genre', 'name');
            var_dump($style->select());
            echo "</pre>";
            Yii::app()->end();*/
        $data['country'] = $location->selectContry();
        $data['city'] = $location->selectCity(1);
        $data['style']= $style->selectStyle();
        //$data['style']=array();
        //$data['genre']=$style->selectGenre();
        $data['genre']=array();
     $this->controller->render('index', $data);
    }
 }