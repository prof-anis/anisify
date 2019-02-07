<?php

use utilities\router\router;
use utilities\session\session;
use utilities\view\view;
use utilities\router\request;

function route($name,$para=[])
{
	return router::url($name,$para);
}

function redirect($url)
{
	return router::redirect($url);
}
function dd($value)
{
	var_dump($value);
	exit;
}
function session($var)
{
	return session::session($var);
}

function random_bytes($var=5)
{	$token=null;
	for ($i=0; $i <=$var ; $i++) { 
		$token.=md5($token).rand(999,9999);
	}
	return $token;
}

function view($file,$arg=[])
{
	return view::loadView($file,$arg);
}

function abort($code,$arg=[])
{
	return view::loadView('error.'.$code,$arg);

}

function request()
{
	$request=new request;
	return $request;
}

function env($key)
{
	require_once dirname(dirname(dirname(__FILE__)))."/config.php";
	return (isset($config[$key])) ? $config[$key]  :  null;
}

define('BASEPATH', dirname(dirname(dirname(__FILE__))));


define('ResourcePath',"http://localhost/anisify/app/views/resources/");


?>