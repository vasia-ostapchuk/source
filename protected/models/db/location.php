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
            $criteria->select='id,name';
            $criteria->condition='parent_id=:parent_id';
            $criteria->params=array(':parent_id'=>'0');
            $result = Location::model()->findAll($criteria);
            $data = array();
            foreach ($result as $value)
            {
                $data[$value->id] = $value->name;
            }
            return $data;
        }
        
        public function selectCity ($id=false)
        {
            if($id)
            {
                $criteria = new CDbCriteria;
                $criteria->select='id,name';
                $criteria->condition='parent_id=:id';
                $criteria->params=array(':id'=>$id);
                $result = Location::model()->findAll($criteria);
                $data = array();
                foreach ($result as $value)
                {
                    $data[$value->id] = $value->name;
                }
                return $data;
            }
        }
    }

