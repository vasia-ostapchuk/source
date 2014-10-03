<?php

 class IndexAction extends CAction {
    public function run()
    {
        //Filter::initialization();
        //error_log(print_r(Yii::app()->basePath,true));
        $data = array();
        $event = Events::$even;
        if(Filter::getSortByDate()){
            usort($event, "Events::sortByDate");
        } elseif(Filter::getSortByPopularity()) {
            usort($event, "Events::sortByPopularity");
        }
        //error_log(print_r($this->controller->getViewFile('poster'),true));
        $data['ajaxContent'] = $this->controller->renderPartial('poster',array('parameters'=>$event),true);
        $data['main_menu'] = $this->controller->renderPartial('main_menu',array(),true);
        $location=new Location;
        $style=new Style;
        
        $data['country'] = $location->selectContry();
        if(!Filter::getCountryId())
            Filter::setCountryId(current(array_keys($data['country'])));
        
        $data['city'] = $location->selectCity(Filter::getCountryId());
        if(!Filter::getCityId())
            Filter::setCityId(0);
            //Filter::setCityId(current(array_keys($data['city'])));

        $data['style']= $style->selectStyle();
        if(!Filter::getStyleId())
            Filter::setStyleId(current(array_keys($data['style'])));
                             /*Filter::getStyleId()*/

        $data['genre']=$style->selectGenre(Filter::getStyleId());
        if(!Filter::getGenreId())
            Filter::setGenreId(current(array_keys($data['genre'])));
        
       // $this->controller->render('index', $data);
        $this->controller->render('translationUser', array('row'=>0));
    }
 }