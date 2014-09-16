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
class LoginAction extends CAction {
    
    public function run()
    {
        $model=new LoginForm;
        //аутентифікація через соціальні мережі
        $service = Yii::app()->request->getQuery('service');
        if (isset($service)) {
            $authIdentity = Yii::app()->eauth->getIdentity($service);
            $authIdentity->redirectUrl = Yii::app()->user->returnUrl;
            $authIdentity->cancelUrl =  Yii::app()->createAbsoluteUrl('site/login');

            if ($authIdentity->authenticate()) {
                $identity = new ServiceUserIdentity($authIdentity);
                //$identity = new SocialUserIdentity($authIdentity);

                // Успешный вход
                if ($identity->authenticate()) {
                    Yii::app()->user->login($identity);

                    // Специальный редирект с закрытием popup окна
                    $authIdentity->redirect();
                }
                else {
                    // Закрываем popup окно и перенаправляем на cancelUrl
                    $authIdentity->cancel();
                }
            }
            // Что-то пошло не так, перенаправляем на страницу входа
            $this->redirect(array('site/login'));
        }
        
        //стандартна аутентифікація
        

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
                $model->attributes=$_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                //$userModel = new User;
                //echo "<pre>"; var_dump($model->attributes); echo "</pre>";                
                if($model->validate() && $model->login())
                        $this->controller->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->controller->render('login',array('model'=>$model));
    }
}