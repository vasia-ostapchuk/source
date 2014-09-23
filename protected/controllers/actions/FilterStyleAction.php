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
        if(isset($_POST['style']))
            {
                $data= Style::model()->selectGenre($_POST['style']);
                foreach ($data as $key=> $value) {
                    echo CHtml::tag('option', array('value' => $key), CHtml::encode($value), true) . "\n";
                }
            }
    }
}
