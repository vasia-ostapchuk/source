<?php
    class Translation extends CActiveRecord
    {
        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }
    
        public function tableName() 
        {
            return 'translation';
        }
        
        public function Save ()
        {
            $criteria = new CDbCriteria;
            $criteria->select='id,name';
            $result = Location::model()->findAll($criteria);
            foreach ($result as $value)
            {
                $data[$value->id] = $value->name;
            }
            return $data;
        }
    }