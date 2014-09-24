<?php

    class FilterCountryAction extends CAction
    {
        public function run() {
            /*echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
            Yii::app()->end();*/
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
    }
