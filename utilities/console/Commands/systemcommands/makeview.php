<?php

/**
* 
*/
namespace Console\Commands\systemcommands;
use Console\console;
use Console\input;
use Console\output;

class makeview extends console
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
		$content=file_get_contents(VIEWPATH.'/sample.php');
	//dd(fopen(BASEPATH.'/utilities/console/Commands/UserCommands/'.$this->input->getInputArg()[0].".php",'w'));
  // $content=str_replace('@name', $this->input->getInputArg()[0],$content);
  
    if(file_put_contents(VIEWPATH."/".$this->input->getInputArg()[0].".php",$content)){
    	$this->output->write('done successfully');

    }
    else{
    	$this->output->break('could not be accomplished');
    }
	
	}


}

?>