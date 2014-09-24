<?php

 class IndexAction extends CAction {
    public function run()
    {
        
        $data = array();
        $data['ajaxContent'] = $this->controller->renderPartial('poster',array('parameters'=>Events::$even),true);
        $location=new Location;
        $style=new Style;
        /*echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";*/
        //Yii::app()->end();
        $data['country'] = $location->selectContry();
        if(!Filter::getCountryId())
            Filter::setCountryId(current(array_keys($data['country'])));
        
        /*echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";*/
        //Yii::app()->end();
        
        $data['city'] = $location->selectCity(Filter::getCountryId());
        if(!Filter::getCityId())
            Filter::setCityId(current(array_keys($data['city'])));
        
        $data['style']= $style->selectStyle();
        if(!Filter::getStyleId())
            Filter::setStyleId(current(array_keys($data['style'])));
                             /*Filter::getStyleId()*/
        $data['genre']=$style->selectGenre();
        if(!Filter::getGenreId())
            Filter::setGenreId(current(array_keys($data['genre'])));
        /*echo "<pre>";
        var_dump($data['country']);
        echo "</pre>";
        Yii::app()->end();*/
     $this->controller->render('index', $data);
    }
 }