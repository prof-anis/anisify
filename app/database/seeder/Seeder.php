<?php
namespace App\database\seeder;
use App\controllers\controller;
use App\database\model\users;
use utilities\database\QueryBuilder\DB;
use Faker\Factory;
use utilities\console\output;

/**
 * 
 */
class Seeder extends controller
{
	
	public function handler(DB $db,$faker)
	{
		$this->output=new output;

		$i=0;
		while($i<10)
		{

			//dd($faker);
			$db->insert('posts',[

				'title'=>$faker->text(10),
				'body'=>$faker->text(200),
				'image'=>$faker->text(10),
				'tags'=>'jj',
				'author'=>$faker->name,
				'cat'=>2
			]);

			$i++;
			$this->output->info($db->getSql());

			$this->output->info($i.' gone');
				
		}

	}
}




?>