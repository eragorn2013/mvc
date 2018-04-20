<?php
class View
{	
	public function render( $main, $input='', $data = null )
	{			
		if($data!=null)$data=new Data($data);
		if($data->captcha===true)
		{ 
			session_start();
			$data->captcha='<img class="captcha" src="/vendor/nemo/captcha/?'.session_name().'='.session_id().'">';	
		}
		include_once './application/views/main/'.$main;
		exit();
	}
	
}