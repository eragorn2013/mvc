<?php

$mode='dev'; // dev | prod
define( 'VERSION', '1.0' );

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);			//Режим вывода ошибок
ini_set('error_log', './application/logs/logs.txt');								//Путь до файла с логами. Для записи логов в файлы по 
																					//умолчанию закомментировать данную настройку.
if($mode==='dev')
{
	ini_set('display_errors', 'on'); 												//Вывод системных ошибок на экран
	ini_set('log_errors', 'off');													//Запись системных ошибок в логи
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header("Cache-Control: post-check=0,pre-check=0", false);
	header("Cache-Control: max-age=0", false);
	header("Pragma: no-cache");
}
else if($mode==='prod')
{
	ini_set('display_errors', 'off'); 												
	ini_set('log_errors', 'on');		
}