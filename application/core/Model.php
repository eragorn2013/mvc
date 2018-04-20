<?php

class Model
{	
	protected $pdo;
	protected $db;

	public function __construct()
	{		
		$data = include './application/config/config_db.php';			
		try
	     {
	     	$this->pdo = new PDO( 'mysql:host='.$data["host"].'; dbname='.$data["dbname"] ,$data['user'],$data['password']  );
	     	$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	     	$this->pdo->exec( 'SET NAMES "utf8"' );	     	
	     }
	     catch( PDOException $e )
	     {exit( 'Ошибка подключения к базе данных: '.$e->getMessage() );}

	    /*$db=new pdoapi();

	    $cfg = ActiveRecord\Config::instance();
		$cfg->set_model_directory('./application/models/tables');
		$cfg->set_connections(
		  array(
		    'connectAR' => 'mysql://'.$data['user'].':'.$data['password'].'@'.$data["host"].'/'.$data["dbname"],		    
		  )
		);	
		$cfg->set_default_connection('connectAR');		*/
	}	
}