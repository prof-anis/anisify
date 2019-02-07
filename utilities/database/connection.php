<?php

namespace utilities\database;

/**
 * 
 */
class connection
{
	
	function __construct($sql,$connection=null)
	{	
		$this->sql=$sql;
		if($connection == null)
		{
			$this->connect();
		//	return $this->checkResponce();
		}
		else{
			$this->handle=$connection;
		}
	}

	public function connect()
	{
		$conn=new \mysqli(env('DBHOST'),'root',env('DBPASS'),'blog');
		if($conn)
		{
			$this->handle=$conn;
			return true;
		}
		return $conn->error;;
	}

	public function query()
	{
		$this->result=$this->handle->query($this->sql);
	}

	public function checkResponce()
	{	$this->query();
		if($this->result)
		{
			return true;
		}
		return $this->handle->error;
	}

	public function get()
	{	$result=[];
		while ($row = $this->result->fetch_assoc()) {
			$result[]=$row['name'];
		}

		return $result;
	}
}







?>