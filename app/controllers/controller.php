<?php

namespace App\controllers;
use utilities\router\request;
use utilities\database\QueryBuilder\DB;
/**
 * 
 */
class Controller extends request
{
	
	function __construct()
	{
		$this->db=DB::getInstance();
	}
}


?>