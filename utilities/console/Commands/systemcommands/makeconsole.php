<?php

/**
* 
*/
namespace utilities\console\Commands\systemcommands;
use utilities\console\console;
use utilities\console\input;
use utilities\console\output;

class makeconsole extends console
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
        
	dd('hello world');
    
    exit;
	$content=file_get_contents(BASEPATH.'/utilities/console/Commands/samplecommands/makeconsole.php');
	//dd(fopen(BASEPATH.'/utilities/console/Commands/UserCommands/'.$this->input->getInputArg()[0].".php",'w'));
   $content=str_replace('@name', $this->input->getInputArg()[0],$content);
    if(file_put_contents(BASEPATH.'/utilities/console/Commands/UserCommands/'.$this->input->getInputArg()[0].".php",$content)){
    	$this->output->write('done successfully');

    }
    else{
    	$this->output->break('could not be accomplished');
    }
	}


}

?>