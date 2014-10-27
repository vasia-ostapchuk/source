<?php

// модель таблиці БД (singer_style)
class Singer_style extends CActiveRecord{ 
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'singer_style';
    }
    
    public function selectBySingerId($user_id)
    {
        $criteria = new CDbCriteria;
        $criteria->select='style_id';
        $criteria->condition='singer_id=:singer_id';
        $criteria->params=array(':singer_id'=>$user_id);
        $result = Singer_style::model()->findAll($criteria);
        $data = array();
        foreach ($result as $i=>$value)
        {
            $data[$i] = $value->style_id;
        }
        return $data;
    }
    
    public function Add()
    {       
            if(!$this->save()){
                print_r($this->getErrors());}
    }
}