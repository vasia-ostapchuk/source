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
