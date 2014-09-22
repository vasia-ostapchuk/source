<?php

    class FilterAction extends CAction
    {
        public function run() {
            if(isset($_POST['country']))
            {
                $data=Location::model()->selectCity($_POST['country']);
                foreach ($data as $key=> $value) {
                    echo CHtml::tag('option', array('value' => $key), CHtml::encode($value), true);
                }
            }
        }
    }
