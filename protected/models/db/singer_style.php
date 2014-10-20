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
    
    public function Add()
    {       
            if(!$this->save()){
                print_r($this->getErrors());}
    }
}