<?php
namespace App\middleware;


/**
 * 
 */
class CsrfMiddleware
{
	
	public function handle()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if($_POST['_token'] == session('_token'))
			{
				return true;
			}

			return false;
		}
		return true;
	}

	public function error()
	{

	}
}




?>