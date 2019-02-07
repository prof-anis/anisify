<?php
namespace App\database\migrations;

use utilities\database\Schema;
use utilities\database\Blueprint;

class @name extends controller
{
	
	

	public function run()
     {
          Schema::create(@table,function(Blueprint $table){
          $table->increment('id');
     
          
          $table->string('updated_at',true);
          });
     }


     public function down()
     {

     }
}


?>