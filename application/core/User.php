<?php

class User
{
	public static function generateLink($link)
	{		
		$link=htmlspecialchars($link);			
		$link.='?v='.VERSION;
		return $link;
	}
}