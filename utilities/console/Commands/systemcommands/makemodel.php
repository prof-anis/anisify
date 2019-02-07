<?php

/**
* 
*/
namespace Console\Commands\systemcommands;
use Console\console;
use Console\input;
use Console\output;

class makemodel extends console
{
	
	

	public function configure(){
     $this

     ->setHelp('create a console page for you')

     ->setOptions([])

     ->setArgument(['name'])

     ->setDescribe('you really want to know?')

     ->prepare();


	}

	public function execute(){
	
	}


}

?>