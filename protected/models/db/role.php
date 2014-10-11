<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of role
 *
 * @author Mr White
 */
class Role extends CActiveRecord{
    //put your code here
    public $id;
    public $name;
    public $alias;
    public $permission_list;
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName() 
        {
            return 'role';
        }
    
    // Правила проверки входящих данных
    public function rules()
    {
        return array(
            array('name, alias, permission_list', 'required'),
        );
    }

    // Метки атрибутов
    public function attributeLabels()
    {
        return array(
            'name' => 'Role',
            'alias' => 'Alias',
            'permission_list' => 'Permissions'
        );
    }
    
    public function selectAll(){
        $criteria = new CDbCriteria;
        $criteria->order = 'id';
        $result = Role::model()->findAll($criteria);
        $data = array();
        foreach ($result as $key => $value)
        {
            $data[$key]['id'] = $value->id;
            $data[$key]['module'] = $value->name;
            $data[$key]['alias'] = $value->alias;
            $data[$key]['permissions'] = explode(',', $value->permission_list);
        }
        error_log(print_r($data,TRUE));
        return $data;
    }
}
