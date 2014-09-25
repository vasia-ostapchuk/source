<?php
//Yii::import('application.controllers.extensions.geoip.GeoIP');
    class FilterController extends CController
    {
        public function actions() {
            return array();
        }
        
        public function actionTest(){
            header("Location:" . Yii::app()->request->hostInfo . Yii::app()->createUrl('site/index'));
            //echo Yii::app()->request->hostInfo;
        }

                public function actionCity(){
            if(Yii::app()->request->getPost('city'))
            {
                Filter::setCityId(Yii::app()->request->getPost('city'));
            }
        }
        
        public function actionCountry(){
            if(Yii::app()->request->getPost('country'))
            {
                Filter::setCountryId(Yii::app()->request->getPost('country'));
                $data=Location::model()->selectCity(Filter::getCountryId());
                Filter::setCityId(current(array_keys($data)));
                //echo "<pre>";
                //error_log(print_r($_SESSION,true));
                //echo "</pre>";
                //Yii::app()->end();
                foreach ($data as $key=> $value) {
                    echo CHtml::tag('option', array('value' => $key), CHtml::encode($value), true);
                }
            }
        }
        
        public function actionStyle(){
            if(Yii::app()->request->getPost('style'))
            {
                Filter::setStyleId(Yii::app()->request->getPost('style'));
                $data= Style::model()->selectGenre(Filter::getStyleId());
                Filter::setGenreId(current(array_keys($data)));
                error_log(print_r($_SESSION['filter'],true));
                foreach ($data as $key=> $value) {
                    echo CHtml::tag('option', array('value' => $key), CHtml::encode($value), true) . "\n";
                }
            }
        }
        
        public function actionGenre(){
            if(Yii::app()->request->getPost('genre'))
            {
                Filter::setGenreId(Yii::app()->request->getPost('genre'));
                $data= Style::model()->selectStyleAllParameters();
                error_log(print_r($data,true));
                $name='';
                echo CHtml::tag('option', array('value'=>$data[Filter::getGenreId()]['style_id'], 'selected'=>true), CHtml::encode($data[Filter::getGenreId()]['name']), true) . "\n";
                $nameStyle=$data[Filter::getGenreId()]['name'];
                error_log($nameStyle);
                Filter::setStyleId($data[Filter::getGenreId()]['style_id']);
                error_log(Filter::getStyleId());
                foreach ($data as $key=> $value) {
                    if($name == $value['name'] || $nameStyle==$value['name']) continue;
                    echo CHtml::tag('option', array('value'=>$value['style_id']), CHtml::encode($value['name']), true) . "\n";
                    $name=$value['name'];
                }
            }
        }
    }
