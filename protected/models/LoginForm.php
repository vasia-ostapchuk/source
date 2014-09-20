<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
        private $hash = '$2a$10$dfda807d832b094184faeu1elwhtR2Xhtuvs3R9J1nfRGBCudCCzC';
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
                        'username'=>'Пошта',
                        'password'=>'Пароль',
			'rememberMe'=>"Запам'ятати мене",
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
                            $full_salt = substr($this->hash, 0, 29);
			$this->_identity=new UserIdentity($this->username,crypt($this->password, $full_salt));
			if(!$this->_identity->authenticate())
                            $this->addError('password','Неправильний логін або пароль.');
                }               
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
                    $full_salt = substr($this->hash, 0, 29);
			$this->_identity=new UserIdentity($this->username,crypt($this->password, $full_salt));
			$this->_identity->authenticate($userData);
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}