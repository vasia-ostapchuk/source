<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginAction
 *
 * @author Mr White
 */
class SignUpAction extends CAction {
    
    public function run()
    {
        // Создать модель и указать ей, что используется сценарий регистрации
        
        $model = new RegistrationForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='RegistrationForm')
        {
                //echo CActiveForm::validate($model);
                $error = CActiveForm::validate($model);
                if($error!='[]')
                    echo $error;
                Yii::app()->end();
        }
        
        // Если пришли данные для сохранения
        if(isset($_POST['RegistrationForm']))
        {
            // Безопасное присваивание значений атрибутам
            $model->attributes = $_POST['RegistrationForm'];

            // Проверка данных
            if($model->validate() && $model->signUp())
            {
                echo CJSON::encode(array(
                              'status'=>'success',
                         ));
                Yii::app()->end();
            }
            else {
                /*echo CJSON::encode(array(
                              'status'=>'error'
                         ));*/
                $error = CActiveForm::validate($model);
                            if($error!='[]')
                                echo $error;
                    Yii::app()->end();
            }
        }
        // вивести форму
       //$this->controller->redirect(Yii::app()->user->returnUrl);
         //$this->renderPartial('registration', array('model'=>$model));
    }
}