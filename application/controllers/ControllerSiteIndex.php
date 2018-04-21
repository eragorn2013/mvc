<?php

class ControllerSiteIndex extends Controller
{
    private $title='';
    private $description='';
    private $keywords='';
    public function __construct()
    {
        parent::__construct();      
        $this->model=new ModelSiteIndex();      
    }

    public function actionIndex()
    {       
        $this->model->test();
        $this->view->render('siteMain.php', 'siteIndex.php', [
            'captcha'=>true,                      
        ]);
    }   
}