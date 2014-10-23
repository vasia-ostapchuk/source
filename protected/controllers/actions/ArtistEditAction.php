<?php
class ArtistEditAction extends CAction {
    
    public function run()
    {
        $model = new Singer;
        $exist = $model->findByAttributes(array('user_id'=>Yii::app()->user->getId()));
        if ($exist) {
            $model = $exist;
            $row_id = $model->id;
            $status='success';
        }
        else {
            $model->name=Yii::app()->request->getPost('name');
            $model->user_id=Yii::app()->user->getId();
            if($row_id = $model->Add()) {
                $status='success';
            }
            else
                $status='error';
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
                    'status'=>$status
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
            $style = new Singer_style;
            $style->name = Yii::app()->request->getPost('style');
            if(Yii::app()->request->getPost('parent_id')) {
                $style->name = Yii::app()->request->getPost('style');
                $style->parent_id = Yii::app()->request->getPost('parent_id');
            }
            if($style->Add()) {
                echo CJSON::encode(array(
                    'status'=>'success'
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
    
    public function edit_element($model, $field, $value) {
            if($model->$field != $value)
                $model->$field = $value;
            if($model->Add()) {
                echo CJSON::encode(array(
                    'status'=>'success'
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