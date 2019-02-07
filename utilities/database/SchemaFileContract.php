<?php

namespace utilities\database;
use utilities\console\output;
use utilities\database\connection;
/**
 * 
 */
class SchemaFileContract
{
	private $sampleFiles=
	[
		'simpleMigrate',
		'createTable'=>'makemigration.php',
		'alterTable',
		'dropTable'
	];
	function __construct($options,$args)
	{
		$this->migrationPath=BASEPATH."/app/database/migrations/";
		$this->fileSamplePath=BASEPATH."/utilities/console/Commands/samplecommands/";
		$this->options=$options;
		$this->args=$args;
		$this->output=new output;
		//$this->connection=new connection;
		$this->handleFileCreation();
		//dd($options);
	}

	public function handleFileCreation()
	{	
		//dd($this->MigrationExists());
		if($this->MigrationExists() === true)
		{
			$this->output->stop('Migration exists already');
		}
		$fileContent=$this->runReplace($this->getFileSampleContent());
		//dd($fileContent);
		$file=$this->createExpectedFile();
		//dd($file);
		//dd($fileContent);
		if(file_put_contents($file,$fileContent))
		{	//$this->informDB();
			$this->FixMigrationTableExists();
			$this->informDB();
			$this->output->stop('successfully created');
		}
		else{
			echo "error!!!";
		}
	}

	public function getFileSampleContent()
	{
		if(array_key_exists('--create',$this->options))
		{	
			$this->expectedName=$this->options['--create'];
			return file_get_contents($this->fileSamplePath.$this->sampleFiles['createTable']);
		}

		elseif (array_key_exists('--table',$this->options)) {
			$this->expectedName=$this->options['--table'];
			//return file_getgo to something else
			//i can continue to do other conditions here.let me 
		}
		return null;
	}

	public function createExpectedFile()
	{	
		return $this->migrationPath.$this->args[0].".php";
	}

	public function runReplace($content)
	{	
		$content=str_replace('@name',$this->expectedName,$content);
		return str_replace("@table","'".$this->args[0]."'",$content);
	}

	public function informDB()
	{	
		//dd($this->args);
		$name=$this->args[0];
		//dd($name);
	$sql="INSERT INTO migration values(null,'$name',0)";//0 status is not migrated, 1 is already migrated
		//$this->connection->connect();
	$query=new connection($sql);
	$fix=$query->checkResponce();
	if($fix === true)
	{
		return true;
	}
	}

	public function FixMigrationTableExists()
	{
		$sql="SELECT * FROM migration";
		$query=new connection($sql);
		$query=$query->checkResponce();
		//dd($query);
		if($query === true)
		{	//dd('hjfgkl');
			$this->output->info('migration table located');
		}
		else{
			//dd('efrgthyjuki');
			//$this->output->info($query);
			$this->output->info('migration table not found, creating now');
			$sql="CREATE TABLE migration (
					id int(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
					name VARCHAR (255) NOT NULL,
					status VARCHAR (255) NOT NULL
				)";
			$query=new connection($sql);
			$fix=$query->checkResponce();
			//dd($fix);
			if($fix === true && is_bool($fix))
			{
				$this->output->info('migration table created');
			}
			return $query->handle->error;
		}

	}

	public function MigrationExists()
	{
		$sql="SELECT * FROM migration Where name='".$this->args[0]."'";
		//dd($sql);
		$query=new connection($sql);
		$fix=$query->checkResponce();
		//dd($query->handle->error);
		//dd($query->result);
		if($query->result ===  true)
		{
			return true;
		}
		return false;
	}
}



?>