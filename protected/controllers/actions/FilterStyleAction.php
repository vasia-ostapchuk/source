<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FilterStyleAction
 *
 * @author Mr White
 */
class FilterStyleAction extends CAction{
    public function run()
    {
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
}
