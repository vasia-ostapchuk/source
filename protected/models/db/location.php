<?php

    class Location extends CActiveRecord
    {
        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }
    
        public function tableName() 
        {
            return 'location';
        }
        
        public function selectContry ()
        {
            $criteria = new CDbCriteria;
            $criteria->select='name';
            $criteria->condition='parent_id=:parent_id';
            $criteria->params=array(':parent_id'=>'0');
            return Location::model()->findAll($criteria);
        }
        
        public function slectCity ()
        {
            
        }
    }

