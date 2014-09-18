<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class FilterForm extends CFormModel
{
    public $country;
    public $sity;
    public $style;
    public $genre;


    public function rules()
    {
        return array(
            array('country, sity, style, genre', 'filter')
        );
    }
}
