<?php
namespace App\controllers;
use App\controllers\controller;
use App\database\model\users;
use App\logics\BlogLogics;
/**
 * 
 */
class BlogController extends controller
{
	
	function __construct()
	{
		parent::__construct();
	//echo "hello world!";
	$this->kk='jj';

	}


		public function index()
		{
			return view('client.main.index');

		}

		public function blogSingle()
		{

		}

		public function blogCategory()
		{

		}

		public function blogAll()
		{

		}

		public function blogTrending()
		{
			
		}
}




?>