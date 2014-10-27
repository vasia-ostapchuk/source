<?php 

class Translation extends CActiveRecord
{
    public $object;
    public $subject;
    public $row_id;
    public $lan_id;
    public $translate;
    //public $update_time;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName() 
        {
            return 'translation';
        }
    
    // Правила проверки входящих данных
    public function rules()
    {
        return array(
            array('object, subject, row_id, lan_id, translate', 'required'),
        );
    }

    // Метки атрибутов
    public function attributeLabels()
    {
        return array(
            'object' => 'Таблиця',
            'subject' => 'Колонка',
            'row' => 'стрічка',
            'translate' => 'Переклад',
        );
    }
    
    /*public function beforeSave()
    {
            //$this->update_time=date('Y-m-d h:m:s', time());
    }*/
    
    public function select($table, $column, $lan_id)
    {
        $criteria = new CDbCriteria;
        $criteria->select='id, translate, row_id';
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
    }
    
    public function Add()
    {       
            if(!$this->save()){
                print_r($this->getErrors());}
                //print_r($this->update_time);
            return $this->id;
    }
}