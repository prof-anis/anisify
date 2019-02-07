<?php
namespace App\database\migrations;

use utilities\database\Schema;
use utilities\database\Blueprint;

class posts 
{
	
	

	public function run()
     {
          Schema::create('posts',function(Blueprint $table){
          $table->increment('id');
          $table->string('title');
          $table->string('cat');
          $table->string('body');
          $table->string('image');
          $table->string('tags')->nullable();
          $table->string('author')->nullable();
     
          
          $table->string('updated_at',true);
          });
     }


     public function down()
     {

     }
}


?>