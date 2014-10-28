<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminAction
 *
 * @author Mr White
 */
class AdministrationAction extends CAction {
    //put your code here
    public function run(){
        $this->controller->render('administration', array());
    }
}
