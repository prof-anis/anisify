<?php
namespace App\database\migrations;

use utilities\database\Schema;
use utilities\database\Blueprint;

class users
{
	
	

	public function run()
     {
          Schema::create('users',function(Blueprint $table){
          $table->increment('id');
     
          
          $table->string('updated_at',true);
          });
     }


     public function down()
     {

     }
}


?>