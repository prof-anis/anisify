<?php

namespace utilities\database;
use utilities\database\Blueprint;
use Closure;
/**
 * 
 */
class Schema
{
	
	function __construct()
	{
	
	}

	public static function create($yy,Closure $rr)
	{	//dd($rr->kk);
		$table=new Blueprint($yy);
		$rr($table);
		$table->buildSql();
		$check=$table->checkResponse();

		if($check)
		{
			return true;
		}
		
	}


	public static function dropIfExists($table)
	{
		$sql="DROP TABLE IF EXISTS ".$table;
	}

	public static function truncate($table)
	{
		$sql="TRUNCATE TABLE ".$table;
	}
}



?>