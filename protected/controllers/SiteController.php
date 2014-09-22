<?php

class SiteController extends Controller
{
    //public $layout = '//layouts/main';
	
	public function actions()
	{
		return array(
                        'index'=>'application.controllers.actions.IndexAction',
                        'error'=>'application.controllers.actions.ErrorAction',
                        'login'=>'application.controllers.actions.LoginAction',
                        'logout'=>'application.controllers.actions.LogoutAction',
                        'signup'=>'application.controllers.actions.SignUpAction',
                        'ajax'=>'application.controllers.actions.AjaxAction',
                        'filter'=>'application.controllers.actions.FilterAction',
		);
	}
}