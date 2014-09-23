<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of style
 *
 * @author Mr White
 */

// модель таблиці БД (style) "стилі музики"
class Style extends CActiveRecord{ 
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'style';
    }
    
    public function selectStyle($id=false){
        /*$criteria = new CDbCriteria;
        $criteria->select='id,name';
        $criteria->condition='parent_id=:parent_id';
        $criteria->params=array(':parent_id'=>(int)0);
        $criteria->order='name';
        $result = Style::model()->findAll($criteria);*/
        if($id)
        {
            $connect=Yii::app()->db;
            $comand=$connect->createCommand('SELECT s2.id as id, s1.name as name FROM style s1, style s2 WHERE s1.id=s2.parent_id AND s2.id='.$id);
            $dataReader=$comand->query();
            $dataReader->bindColumn(1, $styleId);
            $dataReader->bindColumn(2, $styleName);
            $data=array();
            while ($dataReader->read()!==FALSE)
            {
                $data[$styleId] = $styleName;
            }
            return $data;
        }else{
            $result = Style::model()->findAll('parent_id=:parent_id',array(':parent_id'=>(int)0));
            $data=array();
            foreach ($result as $value)
            {
                $data[$value->id] =$value->name;
            }
            return $data;
        }
    }
    
    public function selectGenre($parentId=false){
        if($parentId){
            $result = Style::model()->findAll('parent_id=:parent_id',array(':parent_id'=>(int)$parentId));
        } else {
            $result = Style::model()->findAll('parent_id!=:parent_id',array(':parent_id'=>(int)0));
        }
        $data=array();
        foreach ($result as $value)
        {
            $data[$value->id] =$value->name;
        }
        return $data;
    }
}
