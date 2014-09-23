<?php

    class FilterCountryAction extends CAction
    {
        public function run() {
            /*echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
            Yii::app()->end();*/
            if(isset($_POST['country']))
            {
                $data=Location::model()->selectCity($_POST['country']);
                foreach ($data as $key=> $value) {
                    echo CHtml::tag('option', array('value' => $key), CHtml::encode($value), true);
                }
            }
        }
    }
