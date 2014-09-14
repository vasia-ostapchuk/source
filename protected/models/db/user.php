<?php

class User extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'user';
    }
    
    public function findUserByUsername($username){
        $criteria = new CDbCriteria;
        //$criteria->select='id,first_name,last_name,birthday,phone,email,password';
        $criteria->select='email,password';
        $criteria->condition='email=:email';
        $criteria->params=array(':email'=>$username);
        return User::model()->find($criteria);
    }
}