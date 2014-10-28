<?php

// модель таблиці БД (simage)
class Image extends CActiveRecord{
    
    public $image;
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'image';
    }
    
    public function rules(){
        return array(
            array('image', 'file', 'types'=>'jpg, gif, png', 'maxSize' => 2560000),
        );
    }
    
    /*public function selectBySingerId($singer_id=false)
    {
        $criteria = new CDbCriteria;
        $criteria->select='*';
        $criteria->condition='object=:object AND subject=:subject AND lan_id=:lan_id';
        $criteria->params=array(':object'=>$table, ':subject'=>$column, ':lan_id'=>$lan_id);
        $result = Translation::model()->findAll($criteria);
        $data = array();
        foreach ($result as $value)
        {
            $data[$value->row_id]['translate'] = $value->translate;
            $data[$value->row_id]['id'] = $value->id;
        }
        //error_log(var_dump($data,1));
        return $data;
    }*/
    
    public function Add($file)
    {
        if(!$file) {
            unlink(YiiBase::getPathOfAlias('webroot').'/images/singer/'.$this->path);
            $file = true;
        }
        if($file) {
            $time = microtime();
            $ext = substr($this->image->name, 1 + strrpos($this->image->name, "."));
            if($this->image->saveAs(YiiBase::getPathOfAlias('webroot').'/images/singer/'.md5($this->image->name).$time.".".$ext,true)) {
                $this->path = md5($this->image->name).$time.".".$ext;
            $image_name = $this->path;
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