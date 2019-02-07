<?php

/**
* 
*/
namespace utilities\console\commands\systemcommands;
use utilities\console\console;
use utilities\console\input;
use utilities\console\output;
use utilities\database\SchemaFileContract;
use App\database\seeder\seeder;
use utilities\database\QueryBuilder\DB;
use Faker\Factory;

class seed extends console
{
	
	

	public function configure(){
     $this

     ->setHelp('creates database migration classes')

     ->setOptions([])

     ->setArgument([])

     ->setDescribe('it basicsally creates a file that contains the migration for your database')

     ->prepare();


	}



     public function execute()
     {

          //handles seed generation, all it has to do is to handle the factory class

              $responce=new seeder;
              $db=DB::getInstance();
              $faker=Factory::create();
              $responce->handler($db,$faker);
     
     }


}

?>