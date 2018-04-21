<?php

class User
{
	/*	
		* Генерация ссылки в представлении. Ссылка с версией приложения. 
		* Поменяв версию, браузер загрузит данные с удаленного сервера
		* а не из кэша
	*/		
	public static function generateLink($link)
	{		
		$link=htmlspecialchars($link);			
		$link.='?v='.VERSION;
		return $link;
	}

	/*
		* Вывод данных при помощи print_r
	*/
	public static function out($data)
	{
		echo '<pre>'.print_r( $data, true ).'</pre>';
		exit();
	}

	/*
		* Генерация 404
	*/

	public static function error404()
	{
		http_response_code(404);
		require './404.html';
		exit();
	}

	/*
		* Конвертация в латинский алфавит
	*/

	public static function rus2translit($string)
	{
		$converter = array(
	        'а' => 'a',   'б' => 'b',   'в' => 'v',
	        'г' => 'g',   'д' => 'd',   'е' => 'e',
	        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
	        'и' => 'i',   'й' => 'y',   'к' => 'k',
	        'л' => 'l',   'м' => 'm',   'н' => 'n',
	        'о' => 'o',   'п' => 'p',   'р' => 'r',
	        'с' => 's',   'т' => 't',   'у' => 'u',
	        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
	        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
	        'ь' => '',  'ы' => 'y',   'ъ' => '',
	        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
	        
	        'А' => 'A',   'Б' => 'B',   'В' => 'V',
	        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
	        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
	        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
	        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
	        'О' => 'O',   'П' => 'P',   'Р' => 'R',
	        'С' => 'S',   'Т' => 'T',   'У' => 'U',
	        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
	        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
	        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
	        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
	    );
	    return strtr($string, $converter);
	}

	public static function str2url($str)
	{
		// переводим в транслит
	    $str = rus2translit($str);
	    // в нижний регистр
	    $str = strtolower($str);
	    // заменям все ненужное нам на "-"
	    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
	    // удаляем начальные и конечные '-'
	    $str = trim($str, "-");
	    return $str;
	}

	public static function objToArr($oStdClass) {
	    if (is_object($oStdClass)) {
	        $oStdClass = get_object_vars($oStdClass);
	    }

	    if (is_array($oStdClass)) {
	        return array_map(__FUNCTION__, $oStdClass);
	    }
	    else {
	        return $oStdClass;
	    }
	}
}