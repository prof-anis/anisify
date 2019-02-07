<?php

/**
* 
*/
namespace utilities\console\commands\systemcommands;
use utilities\console\console;
use utilities\console\input;
use utilities\console\output;
use utilities\database\SchemaFileContract;

class migraterollback extends console
{
	
	

	public function configure(){
     $this

     ->setHelp('creates database migration classes')

     ->setOptions(['--create'=>'!required','--table'=>'!required'])

     ->setArgument(['name'])

     ->setDescribe('it basicsally creates a file that contains the migration for your database')

     ->prepare();


	}



     public function execute(){

   
     
     }


}

?>