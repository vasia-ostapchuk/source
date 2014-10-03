<?php 

class TranslationForm extends CFormModel
{
    // Повторный пароль нужно объявить, т.к. этого поля нет в БД
    public $table;
    public $column;
    public $row;
    public $row_id;
    public $lan_id;
    public $translate;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    // Правила проверки входящих данных
    public function rules()
    {
        return array(
            array('column, translate', 'required'),
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

}