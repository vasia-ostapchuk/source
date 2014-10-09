<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddPermissionForm
 *
 * @author Mr White
 */
class AddPermissionForm extends CFormModel{
    
    public $module;
    public $action;
    public $alias;
    
    public function rules()
    {
            return array(
                    array('module, action, alias', 'required'),
            );
    }
        
    public function attributeLabels()
    {
        return array(
                'module'=>'Controller',
                'action'=>'Action',
                'alias'=>'Alias',
        );
    }
    
    /*public function authenticate($attribute,$params)
    {

            if(!$this->hasErrors())
            {
                    $this->_identity=new UserIdentity($this->username,$this->password);
                    if(!$this->_identity->authenticate())
                        $this->addError('password','Неправильний логін або пароль.');
            }               
    }*/
    
}
