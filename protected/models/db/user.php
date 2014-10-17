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
    
    public function selectRole($id){
        /*$userRole = UserRole::model()->findAllByAttributes(array('user_id'=>$id));
        //error_log(print_r($userRole,1));
        $roleListId = array();
        foreach ($userRole as $value){
            $roleListId[] = $value->role_id;
        }*/
        //$role = Role::model()->findAllByAttributes(array('id'=>$roleListId));
        $role = UserRole::model()->with('role')->findAllByAttributes(array('user_id'=>$id));
        $data = array();
        foreach ($role as $value){
            $data[] = $value->role->name;
        }
        return $data;
    }
    
    public function findUserByUsername($username)
    {
        $criteria = new CDbCriteria;
        //$criteria->select='id,first_name,last_name,birthday,phone,email,password';
        $criteria->select='email,password,id';
        $criteria->condition='email=:email';
        $criteria->params=array(':email'=>$username);
        return User::model()->find($criteria);
    }
    
    public function selectAllUsers(){
        $result = User::model()->findAll();
        $data = array();
        foreach ($result as $value){
            $userRole = UserRole::model()->selectAllByUserId($value->id);
            $data[$value->id]['id'] = $value->id;
            $data[$value->id]['username'] = $value->first_name. ' ' . $value->last_name;
            foreach ($userRole as $val){                
                $role = Role::model()->findByPk($val->role_id);
                //$data[$value->id]['role_list']['id'] = $role->id;
                $data[$value->id]['role_list'][$role->id] = $role->name;
            }
        }
        //error_log(print_r($data,1));
        return $data;
    }
    
    public function selectAllUsersWithRole(){        
        $result = User::model()->findAll();
        $data = array();
        foreach ($result as $value){
            $userRole = UserRole::model()->selectAllByUserId($value->id);
            if(empty($userRole)) continue;
            $data[$value->id]['id'] = $value->id;
            $data[$value->id]['username'] = $value->first_name. ' ' . $value->last_name;
            foreach ($userRole as $val){
                $role = Role::model()->findByPk($val->role_id);
                $data[$value->id]['role_list'][$role->id] = $role->name;
            }
        }
        //error_log(print_r($data,1));
        return $data;
    }
    
    public function selectRoleByUser($id){
        $userRole = UserRole::model()->selectAllByUserId($id);
        $roleIdList = array();
        foreach ($userRole as $value){
            $roleIdList[] = $value->role_id;
        }
        $role = Role::model()->findAll();
        $data = array();
        foreach ($role as $value){
            $data[$value->id]['userId'] = $id;
            $data[$value->id]['name'] = $value->name;
            if(in_array($value->id, $roleIdList)){
                $data[$value->id]['check'] = true;
            }else{
                $data[$value->id]['check'] = false;
            }
        }
        //error_log(print_r($data,1));
        return $data;
    }
    
    public function addRoleByUsers($id,$roleId,$change){
        if($change == '1'){
            $userRole = new UserRole;
            $userRole->role_id = $roleId;
            $userRole->user_id = $id;
            $userRole->save();
        }elseif($change == '2') {
            $criteria = new CDbCriteria;
            $criteria->condition='user_id=:userId AND role_id=:roleId';
            $criteria->params=array(':userId'=>$id,':roleId'=>$roleId);
            $userRole = UserRole::model()->find($criteria);
            //error_log(print_r($userRole,1));
            $userRole->delete();
        }
    }
}