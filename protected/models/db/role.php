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
            array('name, alias', 'required'),
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
        foreach ($result as $value)
        {
            $data[$value->id]['id'] = $value->id;
            $data[$value->id]['module'] = $value->name;
            $data[$value->id]['alias'] = $value->alias;
            $premissions = explode(',',$value->permission_list);
            $premissions_alias = Permission::model()->findAllByPk($premissions);
            foreach ($premissions_alias as $val)
                $data[$value->id]['permissions'][$val->id] = $val->alias;
            //error_log(print_r($arr,true));
        }
        //error_log(print_r($data,true));
        return $data;
    }
    
    public function selectPremissionByRole($id){  
        $result = Role::model()->findByPk($id);
        $premissionsByRole = explode(',',$result->permission_list);
        $result = Permission::model()->findAll();
        $data=array();
        foreach($result as $key => $value){
            $data[$key]['id'] = $id;
            $data[$key]['premId'] = $value->id;
            if(in_array($value->id,$premissionsByRole)){
                $data[$key]['check'] = true;
            }  else {
                $data[$key]['check'] = false;
            }
            $data[$key]['alias'] = $value->alias;
        }
        //error_log(print_r($data,true));
        return $data;
    }
    
    public function changeRole($id,$permissionId,$change){
        //Role::model()->exists($condition);
       // error_log('id: '.$id.' permissionId' . $permissionId.' change: '.$change);
        $result = Role::model()->findByPk($id);
        $permissionsByRole = explode(',',$result->permission_list);
        //error_log(print_r($permissionsByRole,1));
        if($change == '1'){ // add premission
            $permissionsByRole[] = $permissionId;
            $result->permission_list = implode(',', $permissionsByRole);
            $result->save();
        } elseif($change == '2') { // delete premission
            //error_log('key = '. array_search($permissionId,$permissionsByRole));
            unset($permissionsByRole[array_search($permissionId,$permissionsByRole)]);
            //error_log('p: '.$permissionId . print_r($permissionsByRole,1));
            $result->permission_list = implode(',', $permissionsByRole);
            //error_log(print_r($result,1));
            $result->save();
        }
    }
    
    public function add(){
        //error_log('module: '.$this->module.' action: '.$this->action.' alias: '.$this->alias);
        if(!$this->save()){
            print_r($this->getErrors());}
            //print_r($this->update_time);
        return $this->id;
    }
    
    public function deleteRole($id){
        $criteria = new CDbCriteria;
        //$criteria->addInCondition('role_id',$id);
        $criteria->condition='role_id=:roleId';
        $criteria->params=array(':roleId'=>$id);
        UserRole::model()->deleteAll($criteria);
        //UserRole::model()->deleteByPk(14);
        Role::model()->deleteByPk($id);
    }
}
