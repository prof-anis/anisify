<?php

/**
* 
*/
namespace utilities\console\commands\systemcommands;
use utilities\console\console;
use utilities\console\input;
use utilities\console\output;
use utilities\database\SchemaMigrateContract;

class migrate extends console
{
	
	

	public function configure(){
     $this

     ->setHelp('migrates database migration files')

     ->setOptions([])

     ->setArgument([])

     ->setDescribe('it basicsally migrates your migration files')

     ->prepare();


	}

	public function execute(){

        $responce=new SchemaMigrateContract;
/*
		$getFileSample=file_get_contents(dirname(dirname(__FILE__))."/samplecommands/makemigration.php");

        $fileContent=str_replace("@name",$this->input->getInputArg()[0],$getFileSample);
        $fileContent=str_replace("@table","'".$this->input->getOption('name')."'",$fileContent);
        $file=dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/app/database/migrations/".str_replace("-","_",date("Y_M_D"))."_".$this->input->getInputArg()[0].".php";
       
        file_put_contents($file,$fileContent);

       // dd($getFileSample);

    */
	
	}


}

?>