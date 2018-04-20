<?php

class Data
{
	public function __construct($data)
	{
		foreach($data as $key=>$val)
		{
			$this->$key=$val;
		}
	}
	public function getType($var)
	{		
		if(isset($var))return gettype($this->$var);
		else return 'Переменной не существует';		
	}
}