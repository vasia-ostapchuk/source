<?php 

class RegistrationForm extends CActiveRecord
{
    // Повторный пароль нужно объявить, т.к. этого поля нет в БД
    public $dtime_registration;
    public $password_repeat;
    public $first_name;
    public $last_name;
    public $password;
    public $email;
    public $birthday;
    public $phone;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user';
    }

    // Правила проверки входящих данных
    public function rules()
    {
        return array(
            // Логин и пароль - обязательные поля
            //array('first_name, last_name, password', 'required'),
            array('email, phone, password', 'required'),
            // Длина логина должна быть в пределах от 5 до 30 символов
            //array('first_name', 'length', 'min'=>5, 'max'=>30),
            // Длина логина должна быть в пределах от 5 до 30 символов
            //array('last_name', 'length', 'min'=>5, 'max'=>30),
            // Логин должен соответствовать шаблону
            //array('login', 'match', 'pattern'=>'/^[A-z][\w]+$/'),
            // Логин должен быть уникальным
            //array('login', 'unique'),
            // Длина пароля не менее 6 символов
            array('password', 'length', 'min'=>6, 'max'=>30),
            // Повторный пароль и почта обязательны для сценария регистрации
            array('password_repeat, email', 'required'),
            // Длина повторного пароля не менее 6 символов
            array('password_repeat', 'length', 'min'=>6, 'max'=>30),
            // Пароль должен совпадать с повторным паролем для сценария регистрации
            array('password', 'compare', 'compareAttribute'=>'password_repeat'),
            // Почта проверяется на соответствие типу
            array('email', 'email'),
            // Почта должна быть в пределах от 6 до 50 символов
            array('email', 'length', 'min'=>6, 'max'=>50),
            // Почта должна быть уникальной
            array('email', 'unique', 'message'=>'Користувач з такою поштою вже існує.'),
            // Почта должна быть написана в нижнем регистре
            array('email', 'filter', 'filter'=>'mb_strtolower'),
            // унікальний телефон
            array('phone', 'unique', 'message'=>'Користувач з таким телефоном вже існує.'),
            // обробка дати народження
            array('birthday', 'safe'),
        );
    }

    // Метки атрибутов
    public function attributeLabels()
    {
        return array(
            'first_name' => 'Ім`я',
            'last_name' => 'Прізвище',
            'password' => 'Пароль',
            'password_repeat' => 'Повторіть пароль',
            'email' => 'Пошта',
            'birthday' => 'Дата народження',
            'phone' => 'Номер телефону',
        );
    }

    // Метод, который будет вызываться до сохранения данных в БД
    protected function beforeSave()
    {
         if(parent::beforeSave())
         {
            if($this->isNewRecord)
            {
                // Время регистрации
                $this->dtime_registration = time();
                // Хешировать пароль
                $this->password = $this->hashPassword($this->password);
            }
            error_log('true');
            return true;
         }
        error_log('false');
        return false;
    }
    public function hashPassword($password)
    {
        error_log('$password');
        return md5($password);
    }
    public function signUp()
    {     
            if(!$this->save()){
                print_r($this->getErrors());} 
            return true;
    }
}