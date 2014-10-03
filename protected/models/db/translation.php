<?php
    class Translation extends CActiveRecord
    {
        
        public $table;
        public $column;
        public $row;
        public $row_id;
        public $lan_id;
        public $translate;
        
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
            $this->save();
        }
    }