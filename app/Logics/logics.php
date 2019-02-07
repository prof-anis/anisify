<?php

namespace App\Logics;
use utilities\router\request;
use utilities\database\QueryBuilder\DB;

/**
 * 
 */
class logics
{
	
	function __construct()
	{
		$this->db=DB::getInstance();
	}
}


?>