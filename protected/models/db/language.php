<?php
    class Language extends CActiveRecord
    {
        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }
    
        public function tableName() 
        {
            return 'language';
        }
        
        public function selectLanId ($name)
        {
            $criteria = new CDbCriteria;
            $criteria->select='id';
            $criteria->condition='name=:name';
            $criteria->params=array(':name'=>$name);
            return Language::model()->find($criteria);
        }
    }