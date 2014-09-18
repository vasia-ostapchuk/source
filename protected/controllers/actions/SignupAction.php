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
class SignupAction extends CAction {
    
    public function run()
    {
        // Создать модель и указать ей, что используется сценарий регистрации
        
        $model = new RegistrationForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='RegistrationForm')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // Если пришли данные для сохранения
        if(isset($_POST['RegistrationForm']))
        {
            // Безопасное присваивание значений атрибутам
            $model->attributes = $_POST['RegistrationForm'];

            // Проверка данных
            if($model->validate() && $model->signup())
            {
                //$model->save();
                // Сохранить полученные данные
                // false нужен для того, чтобы не производить повторную проверку
                //$user->save(false);
                //$this->controller->redirect(Yii::app()->user->returnUrl);
                //$this->redirect(array('site/login'));   
                $this->redirect(backUrl);
            }
        }

        // вивести форму
        $this->controller->render('registration', array('model'=>$model));
    }
}