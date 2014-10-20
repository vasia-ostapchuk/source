<?php
class ArtistEditAction extends CAction {
    
    public function run()
    { 
        CHtml::$liveEvents = false;
        if (Yii::app()->request->isAjaxRequest) {
		Yii::app()->getClientScript()->scriptMap = array(
			'jquery.js' => false,
			'jquery.min.js' => false,
			'jquery-ui.min.js' => false,
                        'jquery-ui.css' => false,
			'jquery.ba-bbq.js'=>false,
			'jquery.yiigridview.js'=>false,
		);
	}
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
        if(Yii::app()->request->getPost('object') == 'name') { //редагуєм назву
            if($model->name != Yii::app()->request->getPost('name'))
                $model->name = Yii::app()->request->getPost('name');
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
        if(Yii::app()->request->getPost('object') == 'description') { //редагуєм опис
            if($model->description != Yii::app()->request->getPost('description'))
                $model->description = Yii::app()->request->getPost('description');
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
        if(Yii::app()->request->getPost('object') == 'site') { //редагуєм сайт
            if($model->site != Yii::app()->request->getPost('site'))
                $model->site = Yii::app()->request->getPost('site');
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
}