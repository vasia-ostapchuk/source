<?php
//Yii::import('application.controllers.extensions.geoip.GeoIP');
    class FilterController extends CController
    {
        public  function getViewPath() {
            $newPath = "application.views.site";
            $newPath = Yii::getPathOfAlias($newPath);
            return $newPath;
        }
        public function getViewFile($viewName) {
            return $this->resolveViewFile($viewName,$this->getViewPath(),$this->getViewPath()); 
        }
        
        public function actions() {
            //Yii::app()->session->open();
            return array();
        }

        public function actionCity(){
            //error_log('city_id ' . Yii::app()->request->getPost('city'));
            Filter::setCityId(Yii::app()->request->getPost('city'));
            //error_log('get city_id ' . Filter::getCityId());
            //error_log(print_r($_SESSION['filter'],true));
        }
        
        public function actionCountry(){
            //error_log(' -------------------- country --------------------------------');
            //error_log('country_id ' . Yii::app()->request->getPost('country'));
            Filter::setCountryId(Yii::app()->request->getPost('country'));
            //error_log('get country_id ' . Filter::getCountryId());
            $data=Location::model()->selectCity(Filter::getCountryId());
            Filter::setCityId(current(array_keys($data)));
            //error_log('get city_id ' . Filter::getCityId());
            //error_log(' -------------------- end country1 --------------------------------');
            //echo "<pre>";
            //error_log(print_r($_SESSION['filter'],true));
            //echo "</pre>";
            //Yii::app()->end();
            //echo CHtml::tag('option', array('value' => 0, 'selected'=>true), CHtml::encode('All city'), true). "\n";
            $tagList='';
            foreach ($data as $key=> $value) {
                $tagList .= CHtml::tag('option', array('value' => $key), CHtml::encode($value), true). "\n";
            }
            $this->responceAjax($tagList);
        }
        
        public function actionStyle(){
            //error_log('style_id ' . Yii::app()->request->getPost('style'));
            Filter::setStyleId(Yii::app()->request->getPost('style'));
            //error_log('get style_id ' . Filter::getStyleId());
            $data= Style::model()->selectGenre(Filter::getStyleId());
            Filter::setGenreId(current(array_keys($data)));
            //error_log(print_r($_SESSION['filter'],true));
            //echo CHtml::tag('option', array('value' => 0, 'selected'=>true), CHtml::encode('All genre'), true) . "\n";
            $tagList='';
            foreach ($data as $key=> $value) {
                $tagList .= CHtml::tag('option', array('value' => $key), CHtml::encode($value), true) . "\n";
            }
            $this->responceAjax($tagList);
        }
        
        public function actionGenre(){
           // error_log('genre_id ' . Yii::app()->request->getPost('genre'));
            Filter::setGenreId(Yii::app()->request->getPost('genre'));
            $tagList='';
            if(Filter::getGenreId()!=0){
                $data= Style::model()->selectStyleAllParameters();
                $tagList .= CHtml::tag('option', array('value'=>$data[Filter::getGenreId()]['style_id'], 'selected'=>true), CHtml::encode($data[Filter::getGenreId()]['name']), true) . "\n";
            } else {
                $data=Style::model()->selectStyle();
                //Filter::setStyleId(0);
                foreach ($data as $key => $value) {
                    if(Filter::getStyleId()==$key){
                        $tagList .= CHtml::tag('option', array('value'=>$key, 'selected'=>true), CHtml::encode($value), true) . "\n";
                    } else {
                        $tagList .= CHtml::tag('option', array('value'=>$key), CHtml::encode($value), true) . "\n";
                    }
                }
                $this->responceAjax($tagList);
                Yii::app()->end();
                /*$nameStyle=$data[0];
                echo CHtml::tag('option', array('value'=>0), CHtml::encode($data[0]), true) . "\n";*/
            }
            //error_log(print_r($data,true));
            $name='';
            //echo CHtml::tag('option', array('value'=>0, 'selected'=>true), CHtml::encode('All genre'), true) . "\n";
            
            $nameStyle=$data[Filter::getGenreId()]['name'];
           // error_log($nameStyle);
            Filter::setStyleId($data[Filter::getGenreId()]['style_id']);
            //error_log(Filter::getStyleId());
            foreach ($data as $key=> $value) {
                if($name == $value['name'] || $nameStyle==$value['name']) continue;
                $tagList .= CHtml::tag('option', array('value'=>$value['style_id']), CHtml::encode($value['name']), true) . "\n";
                $name=$value['name'];
            }
            $this->responceAjax($tagList);
        }
        
        public function actionCalendar(){
            if(Yii::app()->request->getPost('date')){
                Filter::setCalendarDate(Yii::app()->request->getPost('date'));
                //echo Filter::getCalendarDate();
            }
        }
        
        public function actionPrice(){
            Filter::setPriceMax(Yii::app()->request->getPost('price_max'));
            Filter::setPriceMin(Yii::app()->request->getPost('price_min'));
        }
        
        public function actionSortByDate(){
            Filter::setSortByDate(TRUE);
            Filter::setSortByPopularity(FALSE);
            $this->responceAjax();
        }
        
        public function actionSortByPopularity(){
            Filter::setSortByDate(FALSE);
            Filter::setSortByPopularity(TRUE);
            $this->responceAjax();
        }
        
        private function responceAjax($data=null){
            $view = 'poster';
            $event = Events::$even;
            if(Filter::getSortByDate()){
                usort($event, "Events::sortByDate");
            } elseif(Filter::getSortByPopularity()) {
                usort($event, "Events::sortByPopularity");
            }
            //error_log(print_r($this->getViewPath(),true));
            $responce['data']=$data;
            //$responce['adata']=  $this->
            //error_log(print_r($this->getViewFile('poster'),true));
            //error_log(print_r($this->getViewPath(),true));
            $responce['ajaxData']=$this->renderPartial('poster',array('parameters'=>$event),true);
            echo CJSON::encode($responce);
        }
    }
