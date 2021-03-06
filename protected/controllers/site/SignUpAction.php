<?php

class SignUpAction extends CAction {
    
    public function run()
    {
        // Создать модель и указать ей, что используется сценарий регистрации
        
        $model = new RegistrationForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='RegistrationForm')
        {
                //echo CActiveForm::validate($model);
                $error = CActiveForm::validate($model);
                if($error!='[]')
                    echo $error;
                Yii::app()->end();
        }
        
        // Если пришли данные для сохранения
        if(isset($_POST['RegistrationForm']))
        {
            // Безопасное присваивание значений атрибутам
            $model->attributes = $_POST['RegistrationForm'];

            // Проверка данных
            if($model->validate() && $model->signUp())
            {
                echo CJSON::encode(array(
                              'status'=>'success',
                         ));
                Yii::app()->end();
            }
            else {
                $error = CActiveForm::validate($model);
                            if($error!='[]')
                                echo $error;
                    Yii::app()->end();
            }
        }
        // вивести форму
       //$this->controller->redirect(Yii::app()->user->returnUrl);
         //$this->renderPartial('registration', array('model'=>$model));
    }
}
