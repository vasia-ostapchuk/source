<?php

class ViewTranslateAction extends CAction {
    
    public function run()
    { 
        if(Yii::app()->request->getPost('table')) {
            $table = Yii::app()->request->getPost('table'); 
        }
        else {
            $table = 'location';
        }
        if(Yii::app()->request->getPost('lan_id')) {
            $lan_id = Yii::app()->request->getPost('lan_id'); 
        }
        else {
            $lan_id = 2;//en
        }
        
        $dbmodel = ucfirst($table);
        $row = $dbmodel::model()->selectAll();  
        $translateRow = Translation::model()->select($table, $row['subject'][0], $lan_id);

        foreach($row as $k=>$r) {
            $row[$k]['translate'] = isset($translateRow[$k]) ? $translateRow[$k]['translate'] : '';
            $row[$k]['translate_id'] = isset($translateRow[$k]) ? $translateRow[$k]['id'] : '';
        }
        echo CJSON::encode($this->controller->renderPartial('translationUser',array('row'=>$row,'table'=>$table, 'column'=>$row['subject'][0], 'lan_id'=>$lan_id),true, true));
        Yii::app()->end();
    }
}