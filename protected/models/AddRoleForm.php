<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddRoleForm
 *
 * @author Mr White
 */
class AddRoleForm  extends CFormModel{
    public $module;
    public $alias;
    
    public function rules()
    {
            return array(
                    array('module, alias', 'required'),
            );
    }
        
    public function attributeLabels()
    {
        return array(
                'module'=>'Name',
                'alias'=>'Alias',
        );
    }
}
