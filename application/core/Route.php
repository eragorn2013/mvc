<?php

class Route
{
	public static function run()
	{
		$name_controller = ''; // имя контроллера по умолчанию
		$name_action = ''; // имя действия по умолчанию	
		$name_model = '';	
		$config = require_once './application/config/config_route.php'; // возвращается массив с путями маршрутизации
		$uri = htmlspecialchars( URI ); // прогоняем uri через функцию htmlspecialchars
		$data = null; // тут будут в виде массива храниться параметры переданные через строку запроса

		foreach( $config as $key=>$val )//Запускаем цикл получая данные из конфигурации
		{

			if( preg_match( "~$key~", $uri ) ) // в $uri строго должна быть именно та строка, которай указана в $key. Т.е символов ни больше ни меньше
			{					
				$data = explode( '/',  preg_replace( "~$key~", $val, $uri ) );
				$name_controller = array_shift( $data );
				$name_action = array_shift( $data );				
				break;
			}
		}	
		
		$name_model = 'Model'.$name_controller;
		$name_controller = 'Controller'.$name_controller;
		$name_action = 'action'.$name_action;		

		$path_controller = './application/controllers/'.$name_controller.'.php';
		$path_model = './application/models/'.$name_model.'.php';		

		if( file_exists( $path_model ) )//проверяем существует ли такая модель. Если нет, ничего страшного
		{
			include_once $path_model;
		}		

		if( file_exists( $path_controller ) )// проверяем наличие контроллера. Если его нет, то ошибка
		{
			include_once $path_controller;
		}
		else
		{ error404(); }			

		$controller = new $name_controller();       
		
		if( method_exists( $controller, $name_action ) )// проверяем наличие метода в подключенном контроллере
		{  
			call_user_func_array([$controller, $name_action], $data); 			
		}
		else{ error404(); }		
	}
}