<?php

/**
* 
*/
namespace utilities\console\commands\systemcommands;
use utilities\console\console;
use utilities\console\input;
use utilities\console\output;

class makecontroller extends console
{
	
	

	public function configure(){
     $this

     ->setHelp('create a controller file')

     ->setOptions([])

     ->setArgument(['name'=>'required'])

     ->setDescribe('you really want to know?')

     ->prepare();


	}

	public function execute()
	{
		
		$fileContent=file_get_contents(BASEPATH."/utilities/console/commands/samplecommands/makecontroller.php");
		$file=BASEPATH."/app/controllers/".$this->input->getInputArg()[0].".php";
		file_put_contents($file,$fileContent);
	
	}


}

?>