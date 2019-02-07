<?php

namespace utilities\router;

/**
 * 
 */
class Request
{
	
	function __construct()
	{
		
	}

	public function post($name=null)
	{
		if($name != null)
		{
			return (isset($_POST[$name])) ? $this->clean($_POST[$name])  : null;
		}
		 return $this->clean($_POST);
	}

	public function clean($var)
	{	if(is_array($var)){
		$toReturn=[];
		foreach ($var as $key => $value) {
			$toReturn[]=htmlspecialchars(stripslashes(strip_tags($value)));
		}
		return $toReturn;
	}

		return htmlspecialchars(stripslashes(strip_tags($var)));
	
	}

	public function get($name=null)
	{
			if($name != null)
		{
			return (isset($_GET[$name])) ? $this->clean($_GET[$name])  : null;
		}
		 return $this->clean($_GET);
	}
}


?>