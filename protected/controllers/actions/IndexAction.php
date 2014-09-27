<?php

 class IndexAction extends CAction {
    public function run()
    {
        //Filter::initialization();
        $data = array();
        $data['ajaxContent'] = $this->controller->renderPartial('poster',array('parameters'=>Events::$even),true);
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
        
        $this->controller->render('index', $data);
    }
 }