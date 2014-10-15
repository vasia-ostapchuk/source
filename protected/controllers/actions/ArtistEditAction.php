<?php
class TranslateAction extends CAction {
    
    public function run()
    {
        if(Yii::app()->request->getPost('poster')) { //робота з постером
            $model = new Translation;
            $model->object = Yii::app()->request->getPost('table');
            $row = Yii::app()->request->getPost('translate');
            $subject = Yii::app()->request->getPost('column');
            $exist = $model->findByPk(Yii::app()->request->getPost('tr_id'));
            if($exist) {
                $compare = $model->findByAttributes(array('translate'=>$row));
                if ($compare) {
                    echo CJSON::encode(array( //співпадіння стрічок
                    'status'=>'error',
                    ));
                    Yii::app()->end();
                }
                $model = $exist;
            }
            $model->subject= $subject;
            $model->row_id= Yii::app()->request->getPost('row_id');
            $model->lan_id= Yii::app()->request->getPost('lan_id');
            $model->translate= Yii::app()->request->getPost('translate'); 
            if($lastId = $model->Add())
            {
                echo CJSON::encode(array(
                      'status'=>'success',
                      'tr_id' =>$lastId
                ));
                Yii::app()->end();
            }
        }
    }
}