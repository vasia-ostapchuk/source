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
        
        $user = new User;

        // Если пришли данные для сохранения
        if(isset($_POST['User']))
        {
            // Безопасное присваивание значений атрибутам
            $user->attributes = $_POST['User'];

            // Проверка данных
            if($user->validate())
            {
                // Сохранить полученные данные
                // false нужен для того, чтобы не производить повторную проверку
                $user->save(false);

                // Перенаправить на список зарегестрированных пользователей
                $this->redirect($this->createUrl('user/'));
            }
        }

        // Вывести форму
        $this->render('form_signup', array('form'=>$user));
    }
}