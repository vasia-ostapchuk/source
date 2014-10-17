<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserRole
 *
 * @author Mr White
 */
class UserRole extends CActiveRecord{
    //put your code here
    public $id;
    public $user_id;
    public $role_id;
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    public function relations(){
        return array(
          'role'=>array(self::BELONGS_TO, "role", "role_id"),
        );
      }
    public function tableName() 
        {
            return 'user_role';
        }
    
    public function rules()
    {
        return array(
            array('user_id, role_id', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'user_id' => 'UserId',
            'role_id' => 'RoleId'
        );
    }
    public function selectAllByUserId($id){
        $criteria = new CDbCriteria();
        $criteria->condition='user_id=:id';
        $criteria->params=array(':id'=>$id);
        return UserRole::model()->findAll($criteria);
    }
}
