<?php
class Type extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName() 
    {
        return 'type';
    }
        
    public function selectAll()
    {
        $criteria = new CDbCriteria;
        $criteria->select='id,name';
        $result = Type::model()->findAll($criteria);
        foreach ($result as $value)
        {
            $data[$value->id] = $value->name;
        }
        return $data;
    }
}