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
        if(Yii::app()->request->getPost('object') == 'poster') { //робота з постером
            
            $model = new Singer;
            $exist = $model->findByAttributes(array('user_id'=>'4'));
                if ($exist) {
                    $model = $exist;
                } 
            $model->name='test';
            $model->user_id='4';
            $model->image=CUploadedFile::getInstance($model,'image');
            $image_name = $model->Add(true);
            //error_log(var_export($model->image,1));
            //error_log($image_name);

   /* echo CJSON::encode(array( //співпадіння стрічок
    'status'=>'error',
    ));
    Yii::app()->end();*/
            echo CJSON::encode(array(
                'status'=>CHtml::image('/images/singer/'.$image_name,'назва',
                    array( 'class'=>'singer_poster_image', 'title'=>"Постер Друга ріка")
                ),
            ));
            Yii::app()->end();
        }
    }
}