<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        // сіль для паролю
        private $hash = '$2a$10$dfda807d832b094184faeu1elwhtR2Xhtuvs3R9J1nfRGBCudCCzC';
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
            
            /*$users=array(
                    // username => password
                    'demo'=>'demo',
                    'admin'=>'admin',
            );*/
            //$params=User::model()->find
           // $users = 
            $this->password = $this->hashPassword($this->password);
            $users = User::model()->findUserByUsername($this->username);
            if($users == null){
                $this->errorCode=self::ERROR_USERNAME_INVALID;
                return !$this->errorCode;
            }
            $users = array($users->email=>$users->password);
            /*echo "<pre>"; var_dump($users); echo "</pre>";
            echo "<pre>"; var_dump($this); echo "</pre>";
            Yii::app()->end();*/
            if(!isset($users[$this->username]))
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
            elseif($users[$this->username]!==$this->password)
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else
                    $this->errorCode=self::ERROR_NONE;
            return !$this->errorCode;
	}
        public function hashPassword($password) //hash with salt and Blowfish encryption method
        {
            $full_salt = substr($this->hash, 0, 29);
            return crypt($password, $full_salt);
        }
}