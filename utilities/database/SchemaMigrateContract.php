<?php

namespace utilities\database;
use utilities\console\output;
use utilities\database\connection;
/**
 * 
 */
class SchemaMigrateContract
{
	
	function __construct()
	{	$this->output=new output;
		$this->loadMigrations();
	}

	public function loadMigrations()
	{
		$sql="SELECT name FROM migration WHERE status = 0";
		$query=new connection($sql);
		$fix=$query->checkResponce();
		//dd($query->result->num_rows);
		if($query->result->num_rows > 0)
		{
			//proceed
			$migrations=$query->get();

			$this->doMigrate($migrations);
			
		}
		else{
			$this->output->stop('Nothing to migrate');
		}

	}

	public function doMigrate(array $migrants)
	{
		foreach ($migrants as $key => $value) {
			
			$class="\\App\\database\\migrations\\".$value;
			if(class_exists($class)){
				$class=new $class;
				$class->run();
			
				$this->output->info('migrating '.$value);
				$sql="UPDATE migration SET status=1 WHERE name='".$value."'";
				$query=new connection($sql);
				$fix=$query->checkResponce();
				///dd($query);
				if($fix === true)
				{
					$this->output->info('migrated '.$value);
				}

			}
			else{
				$this->output->info('migration file of '.$value.' not found' );
			}
			

		}
	}

}



?>