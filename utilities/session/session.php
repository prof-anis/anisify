<?php

namespace utilities\session;

/**
 * 
 */
class Session
{
	
	function __construct()
	{
		@session_start();
	}

	public static function session($var)
	{
		if(is_array($var))
		{
			foreach ($var as $key => $value) {
				$_SESSION[$key]=$value;
			}
		}
		elseif(is_string($var))
		{
			return (isset($_SESSION[$var])) ? $_SESSION[$var] : null;
		}
	}

	public static function destroy($key)
	{
		$_SESSION[$key]=null;
		unset($_SESSION[$key]);
	}

	public static function flash(array $var)
	{
		foreach ($var as $key => $value) {
			$_SESSION['flash_'.$key]=$value;
			$_SESSION['flash_track'.$key]=false;
		}
	}

	public static function deFlash()
	{
		
	}
	
}



?>