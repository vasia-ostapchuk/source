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
class TranslateAction extends CAction {
    
    public function run()
    { 
        $model = new Translation;

        /*if(Yii::app()->request->getPost('new_parent') == true) {
            $table = ucfirst(Yii::app()->request->getPost('table'));
                $translate = new $table;
            $row_id= Yii::app()->request->getPost('row_id');
            $row = Yii::app()->request->getPost('row');
            $subject = Yii::app()->request->getPost('subject');
            $exist = $translate->findByAttributes(array('id'=>$row_id,$subject=>$row));
            if ($exist) {
                $translate = $exist;
            }
                $translate->$subject=Yii::app()->request->getPost('row');
                $translate->Add();
        }*/
        
        $model->object = Yii::app()->request->getPost('table');

        $exist = $model->findByPk(Yii::app()->request->getPost('tr_id'));
        if($exist) {
            $model = $exist;
        }
        $model->subject= Yii::app()->request->getPost('subject');
        $model->row_id= Yii::app()->request->getPost('row_id');
        $model->lan_id= Yii::app()->request->getPost('lan_id');
        $model->translate= Yii::app()->request->getPost('translate'); 

        if($lastId = $model->Add())
        {

            echo CJSON::encode(array(
                          'status'=>'success',
                          'tr_id' =>$lastId
                     ));
        }
        else {
            echo CJSON::encode(array(
                          'status'=>'error',
                     ));
        }
        Yii::app()->end();
    }
}