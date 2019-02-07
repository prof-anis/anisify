<?php
namespace App\controllers;
use App\controllers\controller;
use App\database\model\users;
/**
 * 
 */
class MainController extends controller
{
	
	function __construct()
	{
		parent::__construct();
	//echo "hello world!";
	$this->kk='jj';

	}

	public function index($hh,$rr,$tr)
	{	//var_dump($rr);
		//echo "i am in index";
		//echo route('james',['fff','eee','eees']);
		
		echo route('james');
		//dd(request()->post());
		//return redirect(route('james'));
	}
	public function indexo()
	{	dd(env('DBHOST'));
		return view('anis');
	}

	public function store()
	{

	}
}




?>