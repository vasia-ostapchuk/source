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
    
    public function selectBySingerId($singer_id) {
        $style_id = Singer_style::model()->selectBySingerId($singer_id);
        $id = (isset($style_id)) ? $style_id : array('0');
        $criteria = new CDbCriteria;
        $criteria->select='*';
        $criteria->addInCondition('id', $id);
        $criteria->order='name';
        $result = Style::model()->findAll($criteria);
        foreach ($result as $i=>$value) {
            if($value->parent_id != 0)
                $children[$value->parent_id][]= array('text'=>$value->name);
            else
                $parents[$value->id]= array('id'=>'style'.$value->id, 'text'=>$value->name);
        }
        if(isset($parents))
            foreach ($parents as $id=>$array) {
                if(isset($children[$id]))
                    $parents[$id]['children'] = $children[$id];
                $prepared[] = $parents[$id];
            }
        //error_log(var_export($prepared,1));
        return (isset($prepared)) ? $prepared : false;
    }
    
    public function getNewParent($style_id, $exist) {
        $criteria = new CDbCriteria;
        $criteria->distinct = true;
        $criteria->select='parent_id';
        $criteria->condition='parent_id!=:parent_id';
        $criteria->params=array(':parent_id'=>0);
        $criteria->addInCondition('id', $style_id);
        $result = Style::model()->findAll($criteria);
        //error_log(var_export($result,1));
        foreach ($result as $i=>$value) {
            if(!in_array($value->parent_id, $exist))
                $parent[$value->parent_id] = $value->parent_id; 
        }
        return (isset($parent)) ? $parent : false;
    }
    
     public function findStyleWeights($limit = 50, $singer_id=false) {
        $tags = array();
        //$id = array('0');
        $style = Singer_style::model()->selectBySingerId($singer_id);
        $id = (isset($style)) ? $style : array('0');
        /*foreach ($style as $i=>$value)
            $id[] = $value;*/
        $criteria = new CDbCriteria;
        $criteria->select='*';
        $criteria->addNotInCondition('id', $id);
        $criteria->order='name';
        $criteria->limit=$limit;
        $models = Style::model()->findAll($criteria);
        
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