<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogoutAction
 *
 * @author Mr White
 */
class LogoutAction extends CAction{
    public function run()
    {
        Yii::app()->user->logout();
        Yii::app()->session->destroy();
        $this->controller->redirect(Yii::app()->user->returnUrl);
        //$this->controller->render('index');
    }
}