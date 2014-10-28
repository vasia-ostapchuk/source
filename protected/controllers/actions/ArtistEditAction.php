<?php
class ArtistEditAction extends CAction {
    
    public function run()
    {
        $model = new Singer;
        $exist = $model->findByAttributes(array('id'=>Yii::app()->request->getPost('singer_id')));
        if ($exist) {
            $model = $exist;
            $row_id = $model->id;
            //$status='success';
        }
        else {
            $model->name= (Yii::app()->request->getPost('name')) ? Yii::app()->request->getPost('name') : 'noname';
            $model->user_id=Yii::app()->request->getPost('user_id');
            if(!$row_id = $model->Add()) {
                echo CJSON::encode(array(
                        'status'=>'error'
                ));
            Yii::app()->end();
            }
        }
                
        switch (Yii::app()->request->getPost('object')) {//редагуєм текстові поля
        case 'name':
            $this->edit_element($model, 'name', Yii::app()->request->getPost('name'));
            break;
        case 'description':
            $this->edit_element($model, 'description', Yii::app()->request->getPost('description'));
            break;
        case 'site':
            $this->edit_element($model, 'site', Yii::app()->request->getPost('site'));
            break;
        }
        
        if(Yii::app()->request->getPost('object') == 'poster') { //редагуєм постер
            $poster = new Image;
            $exist = $poster->findByAttributes(array('table'=>'singer','row_id'=>$row_id));
            if ($exist) {
                $poster = $exist;
                $new = false;
            }
            else
                $new = true;
            
            $poster->image = CUploadedFile::getInstance($poster,'image');
            $poster->table = 'singer';
            $poster->type_id = '3';
            $poster->row_id = $row_id;
            if($image_name = $poster->Add($new)) {
                echo CJSON::encode(array(
                    'part'=>CHtml::image('/images/singer/'.$image_name,'назва',
                    array( 'class'=>'singer_poster_image', 'title'=>"Постер Друга ріка")
                    ),
                    'status'=>'success',
                    'singer_id'=>$row_id,
                ));
                Yii::app()->end();
            }
            else {
                echo CJSON::encode(array(
                    'part'=>CHtml::textField('ERROR',''),
                    'status'=>$status
                ));
                 Yii::app()->end();
            }
        }
        
        if(Yii::app()->request->getPost('object') == 'style') { //редагуєм стилі
            $style_id = explode(',', Yii::app()->request->getPost('id'));
            //$exist = Singer_style::model()->selectBySingerId($model->id);
            $style = array();
            /*foreach ($style_id as $key => $id)
                if (in_array($id, $exist)) {
                unset($style_id[$key]);
                }*/
            foreach ($style_id as $i=>$id) {
                $style[$i] = new Singer_style();
                $style[$i]->singer_id = $model->id;
                $style[$i]->style_id = $id;
            }
            if($style) {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    foreach ($style as $i=>$item)
                        $item->save(false);
                    $transaction->commit();
                }
                catch (Exception $e) {
                    $transaction->rollback();
                    echo CJSON::encode(array(
                        'status'=>'error'
                    ));
                    Yii::app()->end();
                }
            }
            echo CJSON::encode(array(
                    'status'=>'success',
                    'singer_id'=>$row_id,
                ));
            Yii::app()->end();
        }
    }
    
    public function edit_element($model, $field, $value) {
            if($model->$field != $value)
                $model->$field = $value;
            if($model->Add()) {
                echo CJSON::encode(array(
                    'status'=>'success',
                    'singer_id'=>$model->id,
                ));
            }
            else {
                echo CJSON::encode(array(
                    'status'=>'error'
                ));
            }
            Yii::app()->end();
    }
}