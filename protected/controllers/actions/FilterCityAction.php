<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FilterCityAction
 *
 * @author Mr White
 */
class FilterCityAction1 extends CAction {
    public function run(){
        if(Yii::app()->request->getPost('city'))
            {
                Filter::setCityId(Yii::app()->request->getPost('city'));
            }
    }
}
