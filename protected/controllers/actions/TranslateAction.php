<?php
class TranslateAction extends CAction {
    
    public function run()
    {
        if(Yii::app()->request->getPost('translate')) { //переклади в таблиці translation
            $model = new Translation;
            $model->object = Yii::app()->request->getPost('table');
            $exist = $model->findByPk(Yii::app()->request->getPost('tr_id'));
            if($exist) {
                $model = $exist;
            }
            $model->subject= Yii::app()->request->getPost('column');
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
        else { //перекладаєм оригінальний текст
            $table = ucfirst(Yii::app()->request->getPost('table'));
            
            $object = new $table;
            
            $subject = Yii::app()->request->getPost('column');
            $row = Yii::app()->request->getPost('row');
            $object->setAttribute($subject, $row);
            $exist = $object->findByAttributes(array('id'=>$row_id,$subject=>$row));
            if ($exist) {
                $object = $exist;
            }
            else {
                echo CJSON::encode(array( //стрічка не може бути новою
                'status'=>'error',
                ));
            }
            $object->$subject=Yii::app()->request->getPost('row');
            if($object->Add())
            {
                echo CJSON::encode(array(
                  'status'=>'success',
                ));
                Yii::app()->end();
            }
        }
        echo CJSON::encode(array( //помилка запису
            'status'=>'error',
        ));
        Yii::app()->end();
    }
}