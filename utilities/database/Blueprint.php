<?php

namespace utilities\database;

/**
 * 
 */
class Blueprint
{
	private $sizeArray=[

		'VARCHAR'=>255,
		'int'=>100

	];
	function __construct($table)
	{
		$this->table=$table;
	}

	public function string($name)
	{	$this->track=$name;
		$this->fieldName[$name]=$name;
		$this->dataType[$name]="VARCHAR";
		$this->dataSize[$name]=$this->sizeArray[$this->dataType[$name]];
		return $this;
	}

	public function increment($name)
	{
		$this->track=$name;
		$this->increment[$name]=true;
		$this->fieldName[$name]=$name;
		$this->dataType[$name]="int";
		$this->dataSize[$name]=$this->sizeArray[$this->dataType[$name]];
		return $this;
	}

	public function nullable()
	{
		$this->isNullable[$this->track]=true;
	}

	public function date($name,$timestamp=null)
	{
		$this->track=$name;
		
		$this->fieldName[$name]=$name;
		$this->dataType[$name]=($timestamp == true) ? "TIMESTAMP()" : "DATETIME()";
		$this->dataSize[$name]="";
		return $this;
	}

	



	public function buildSql()
	{
		$sql=" CREATE TABLE ".$this->table." ( ";
		$sql.=$this->getParaIfExist();
		$sql.=" ) ";

		$this->sql=$sql;
		return $sql;

	}

	public function getParaIfExist()
	{	$form='';
	$i=1;
		foreach ($this->fieldName as $key => $nameToTrack) {
			
			

			$form.=$nameToTrack."  ".$this->dataType[$nameToTrack]."  (".$this->dataSize[$nameToTrack].") ";
			if(!isset($this->isNullable[$nameToTrack])){
				$form.=" NOT NULL";
			}
			if(isset($this->increment[$nameToTrack]))
			{
				$form.=" AUTO_INCREMENT PRIMARY KEY";
			}




			if($i<count($this->fieldName)){
				$form.=",";
			}
			$i++;

		}
		return $form;
	}

	public function query()
	{
		if($this->connect() == true){
			$this->result=$this->handle->query($this->sql);
		}
	}
	public function checkResponse()
	{
		$this->query();
//dd($this->result);
		if($this->result){
			return true;
		}
		else{
			return $this->handle->error;
		}

	}

	public function connect()
	{	//dd(env('DBNAME'));
		$conn = new \mysqli('localhost', 'root', '', 'blog');
		//dd($conn);
		if($conn)
		{
			$this->handle=$conn;
			return true;
		}
		return $conn->error;
		

	}

	//public function



}


?>