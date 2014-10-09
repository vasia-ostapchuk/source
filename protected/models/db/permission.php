<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of permission
 *
 * @author Mr White
 */
class Permission extends CActiveRecord{
    public $id;
    public $module;
    public $action;
    public $alias;
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName() 
        {
            return 'permission';
        }
    
    // Правила проверки входящих данных
    public function rules()
    {
        return array(
            array('module, action, alias', 'required'),
        );
    }

    // Метки атрибутов
    public function attributeLabels()
    {
        return array(
            'module' => 'Controller',
            'action' => 'Action',
            'alias' => 'Alias',
        );
    }
    
    public function selectAll(){
        $criteria = new CDbCriteria;
        $criteria->order = 'id';
        $result = Permission::model()->findAll($criteria);
        $data = array();
        foreach ($result as $key => $value)
        {
            $data[$key]['id'] = $value->id;
            $data[$key]['module'] = $value->module;
            $data[$key]['action'] = $value->action;
            $data[$key]['alias'] = $value->alias;
        }
        return $data;
    }
    
    public function deleteById($id){
        $post=Permission::model()->findByPk($id); 
        $post->delete(); 
    }
    /*$module,$action,$alias*/
    public function add(){
        //error_log('module: '.$this->module.' action: '.$this->action.' alias: '.$this->alias);
        if(!$this->save()){
            print_r($this->getErrors());}
            //print_r($this->update_time);
        return $this->id;
    }
}
