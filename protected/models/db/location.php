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
            $result = Location::model()->findAll($criteria);
            $arr = array();
            foreach ($result as $value)
            {
                $arr[] = $value->name;
            }
            return $arr;
        }
        
        public function selectCity ($nameContry=null)
        {
            if(!empty($nameContry))
            {
                $id=Location::model()->find('name=:name',array(':name'=>$nameContry))->id;
                $criteria = new CDbCriteria;
                $criteria->select='name';
                $criteria->condition='parent_id=:parent_id';
                $criteria->params=array(':parent_id'=>$id);
                $result = Location::model()->findAll($criteria);
            }
        }
    }

