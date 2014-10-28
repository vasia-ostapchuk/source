<?php

// модель таблиці БД (singer)
class Singer extends CActiveRecord{
        
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'singer';
    }
    
    public function selectBySingerId($singer_id) {
        $criteria = new CDbCriteria;
        $criteria->select='*';
        $criteria->condition='id=:singer_id';
        $criteria->params=array(':singer_id'=>$singer_id);
        $result = Singer::model()->find($criteria);
        $image = Image::model()->selectByRow('singer', $singer_id);
        $result = $result['attributes'];
        if($image)
           $result['path'] = $image->path;
        return $result;
    }
    
    public function Add($attributes=false)
    {       
        if(!$this->save()) {
            print_r($this->getErrors());
        }
        return $this->id;
    }
}