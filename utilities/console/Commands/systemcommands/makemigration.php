<?php

/**
* 
*/
namespace utilities\console\commands\systemcommands;
use utilities\console\console;
use utilities\console\input;
use utilities\console\output;
use utilities\database\SchemaFileContract;

class makemigration extends console
{
	
	

	public function configure(){
     $this

     ->setHelp('creates database migration classes')

     ->setOptions(['--create'=>'required','--table'=>'!required'])

     ->setArgument(['name'])

     ->setDescribe('it basicsally creates a file that contains sthe migration for your database')

     ->prepare();


	}

	public function execute(){

        $responce=new SchemaFileContract($this->input->getOptions(),$this->input->getInputArg());
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