<?php
namespace App\database\migrations;

use utilities\database\Schema;
use utilities\database\Blueprint;

class cats 
{
	
	

	public function run()
     {
          Schema::create('cats',function(Blueprint $table){
          $table->increment('id');
          $table->string('cat_name');
          $table->string('cat_desc')->nullable();
     
          
          $table->string('updated_at',true);
          });
     }


     public function down()
     {

     }
}


?>