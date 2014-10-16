<?php

// модель таблиці БД (singer)
class Singer extends CActiveRecord{
    
    public $image;
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'singer';
    }
    
    public function rules(){
        return array(
            array('image', 'file', 'types'=>'jpg, gif, png', 'maxSize' => 2560000),
        );
    }
    
   /* public function selectSinger(){
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
    }
    
    public function selectAll(){
        
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
    }*/
    
    public function Add($file=false)
    {       
        if($file) {
            $time = microtime();
            $ext = substr($this->image->name, 1 + strrpos($this->image->name, "."));
            if($this->image->saveAs(YiiBase::getPathOfAlias('webroot').'/images/singer/'.md5($this->image->name).$time.".".$ext,true)) {
                $this->image_id = md5($this->image->name).$time.".".$ext;
            $image_name = $this->image_id;
            }
            else print_r('error loading file');
        }
        if(!$this->save()) {
            print_r($this->getErrors());
        }
        if($image_name)
            return $image_name;
    }
}