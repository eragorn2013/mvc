<?php
class ControllerAdminIndex extends Controller
{
	/*******************************/

	public function __construct()
	{	
		parent::__construct();		
		require_once './application/models/modelAdminLogin.php';
		$this->ModelAdminLogin = new ModelAdminLogin();		
		if(!$this->ModelAdminLogin->login())$this->view->render('adminLogin.php');				
	}

	/*******************************/

	public function actionExit()
	{
		$this->ModelAdminLogin->exitLogin();
		$this->view->render('adminLogin.php');
	}	

	/*******************************/

	public function actionIndex()
	{		
		$this->view->render('adminMain.php','adminIndex.php');
	}	
}