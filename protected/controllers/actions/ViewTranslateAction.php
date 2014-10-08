<?php

class ViewTranslateAction extends CAction {
    
    public function run()
    { 
        //CHtml::$liveEvents = false;
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
        $model = new Translation;
        if(Yii::app()->request->getPost('table')) {
            $table = Yii::app()->request->getPost('table'); 
        }
        else {
            $table = 'location';
        }  
        $model->object= $table;
        
        $lan_id = 2;
        $dbmodel = ucfirst($table);
        $row = $dbmodel::model()->selectAll();  
        $translateRow = Translation::model()->select($model->object, $row['subject'][0], $lan_id);

        foreach($row as $k=>$r) {
            $row[$k]['translate'] = isset($translateRow[$k]) ? $translateRow[$k]['translate'] : '';
            $row[$k]['translate_id'] = isset($translateRow[$k]) ? $translateRow[$k]['id'] : '';
        }
        $parameters=array('table'=>$model->object, 'column'=>$row['subject'][0]);
        echo CJSON::encode($this->controller->renderPartial('translationUser',array('row'=>$row,'model'=>$model,'parameters'=>$parameters),true, true));
        Yii::app()->end();
    }
}