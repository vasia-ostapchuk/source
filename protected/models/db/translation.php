<?php 

class Translation extends CActiveRecord
{
    public $table;
    public $column;
    public $row_id;
    public $lan_id;
    public $translate;

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
            array('table, column, row_id, lan_id, translate', 'required'),
        );
    }

    // Метки атрибутов
    public function attributeLabels()
    {
        return array(
            'table' => 'Таблиця',
            'column' => 'Колонка',
            'row' => 'стрічка',
            'translate' => 'Переклад',
        );
    }
    
    public function select($table, $column, $lan_id)
    {
        $criteria = new CDbCriteria;
        $criteria->select='id, translate';
        $criteria->condition='table=:table AND column=:column AND lan_id=:lan_id';
        $criteria->params=array(':table'=>$table, ':column'=>$column, ':lan_id'=>$lan_id);
        $result = Translation::model()->findAll($criteria);
        $data = array();
        foreach ($result as $value)
        {
            $data[$value->id] = $value->translate;
        }
        //error_log(var_dump($data));
        return $data;
    }
    public function Add()
    {       
        /*$exist = $this->findByAttributes(array('row_id'=>$this->row_id));
        if(!$exist) {*/
            if(!$this->save()){
                print_r($this->getErrors());} 
            return true;
        /*}
        else {
            $this->setIsNewRecord(FALSE)  ;
            error_log($this->translate);
            if(!$this->update($this->attributes)){
                print_r($this->getErrors());} 
            return true;
        }*/
    }
}