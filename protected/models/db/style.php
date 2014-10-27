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
class Style extends CActiveRecord { 
    
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
            $data[0]='All style';
            while ($dataReader->read()!==FALSE)
            {
                $data[$styleId] = $styleName;
            }
            return $data;
        }else{
            $result = Style::model()->findAll('parent_id=:parent_id',array(':parent_id'=>(int)0));
            $data=array();
            $data[0]='All style';
            foreach ($result as $value)
            {
                $data[$value->id] =$value->name;
            }
            return $data;
        }
    }
    
    public function selectStyleAllParameters(){
        
        $connect=Yii::app()->db;
        $comand=$connect->createCommand('SELECT s2.id as id, s1.name as name, s1.id as style_id  FROM style s1, style s2 WHERE s1.id=s2.parent_id ORDER BY name');
        $dataReader=$comand->query();
        $dataReader->bindColumn(1, $genreId);
        $dataReader->bindColumn(2, $styleName);
        $dataReader->bindColumn(3, $styleId);
        $data=array();
        $data[0]=array('name'=>'All style', 'style_id'=>0);
        while ($dataReader->read()!==FALSE)
        {
            $data[$genreId] = array('name'=>$styleName,'style_id'=>$styleId);
        }
        return $data;
    }
    
    public function selectGenre($parentId=false){
        if($parentId){
            $result = Style::model()->findAll('parent_id=:parent_id',array(':parent_id'=>(int)$parentId));
        } else {
            $result = Style::model()->findAll('parent_id!=:parent_id',array(':parent_id'=>(int)0));
        }
        $data=array();
        $data[0]='All genre';
        foreach ($result as $value)
        {
            $data[$value->id] =$value->name;
        }
        return $data;
    }
    
     public function findStyleWeights($limit = 20) {
        $tags = array();
        $models = $this->findAll(array(
            'limit' => $limit,
            'order'=>'name'
        ));
        $sizeRange = 8;
        $minCount = log(3 + 1); //log(Yii::app()->db->createCommand("SELECT MIN(frequency) FROM " . $this->tableName())->queryScalar() + 1);
        $maxCount = log(0 + 1);//log(Yii::app()->db->createCommand("SELECT MAX(frequency) FROM " . $this->tableName())->queryScalar() + 1);
        $countRange = ($maxCount - $minCount == 0) ? 1 : $maxCount - $minCount;
        foreach ($models as $model) {
            $tags[$model->name] = array('weight' => round(12 + (log($model->parent_id + 1) - $minCount) * ($sizeRange / $countRange)), 'id' => $model->id);
        }
        return $tags;
    }
   
    public function Add()
    {       
            if(!$this->save()){
                print_r($this->getErrors());}
    }
}