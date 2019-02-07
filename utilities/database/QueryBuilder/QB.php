<?php

namespace utilities\database\QueryBuilder;

/**
 * 
 */
class QB
{	
	public function connect()
	{
		$conn=new \mysqli('localhost','root','','hospital');
		if($conn)
		{
			$this->handle=$conn;
			return true;
		}
		return $conn->error;
	}

	public function select(array )
	{

	}
}



?>