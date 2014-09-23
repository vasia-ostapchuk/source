<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FilterGenreAction
 *
 * @author Mr White
 */
class FilterGenreAction extends CAction {
    public function run()
    {
        if(Yii::app()->request->getPost('genre'))
            {
                $data= Style::model()->selectStyle(Yii::app()->request->getPost('genre'));
                foreach ($data as $key=> $value) {
                    echo CHtml::tag('option', array('value' => $key), CHtml::encode($value), true) . "\n";
                }
            }
    }
}
