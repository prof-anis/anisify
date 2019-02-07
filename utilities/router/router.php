<?php

namespace utilities\router;

/**
 * 
 */
class router
{	
	public static $route;
	
	function __construct()
	{	$this->turnUrlToArray();
	$this->removeEmptyLinks();
$this->inspectRoutesGiven();
$this->matchClass();
	}

	public function getUrl()
	{	//$this->url=$_SERVER['REQUEST_URI'];
		return $_SERVER['REQUEST_URI'];
	}

	public function getHost()
	{
		return $_SERVER['HTTP_HOST'];
	}

	public static function Route($request_method,$pattern,$callback,$name=null,$middleware=null)
	{
		self::$route[(($name != null)?$name:"anis".count(self::$route))]=['request'=>$request_method,'pattern'=>$pattern,'callback'=>$callback,'name'=>$name,"middleware"=>$middleware];
	
	}

	public static function getRoutes()
	{
		return self::$route;
	}

	public function turnUrlToArray()
	{	$this->url=explode('/',$this->getUrl());
		return explode('/',$this->getUrl());
	}

	public function removeEmptyLinks()
	{
		foreach ($this->url as $key => $value) {
			
			if($value == '')
			{
				unset($this->url[$key]);
				$this->url=array_values($this->url);
				//array_
			}
			//var_dump($this->url);
		}

		return $this->url;
	}

	public function inspectRoutesGiven()
	{	

	$pass=[];
	$parameter=[];
	$counter=0;

	foreach (self::$route as $key => $route) {
		$pattern=explode('/',$route['pattern']);
		//var_dump($pattern);
		foreach ($pattern as $key => $value) {
			$url=(isset($this->url[$key])) ? $this->url[$key] : null;
			if($url !== null)
			{
				$counter++;
			}
			//echo "<br>".$value."----------".$url."---------------".$key;
				if($value == $url)
				{
					$pass[]=true;
				}
				elseif (strpos($value,":") > -1 && $url!==null) {
					$parameter['anis_'.count($parameter)]=$url;
					//dd(strpos($value,":"));
				}
				else{
					$pass[]=false;
				}
		}	
			if(!in_array(false,$pass))
			{
				$this->routeToUse=$route;
				$this->parameter=(!empty($parameter))? $parameter : null;
				$this->counter=$counter;
			}

			$pass=null;
			$parameter=null;
			$counter=0;
		
	

	
	}
	if(!isset($this->routeToUse))
	{
		abort(404);
	}

	


	

	}

	public function matchClass()
	{	//$rr=strstr(,);
		//echo count($this->parameter);
		
		if($this->compulsoryParameters() != $this->givenParameter())
		{
			abort(404);
		}
		//dd($this->url);
		//fix the counting thing
		if($this->counter != count($this->url)){
			abort(404);
		}

		$pattern=explode('@',$this->routeToUse['callback']);
		$class=$pattern[0];
		$method=$pattern[1];

		$class="App\\controllers\\".$class;
		//check the middleware

		if(!$this->loadMiddleWare()){
				exit;
		}
		$this->setCsrfToken();

		//
		$loadClass=new $class;

		if(!empty($this->parameter)){
		//	var_dump(compact($this->parameter));
			$i=0;
			//$para=implode(',',$this->parameter);
			//var_dump($this->parameter);
			//var_dump(extract($this->parameter));
			//echo $anis_1;
			//exit;
		$options=extract($this->parameter);
			$loadClass->$method((isset($anis_0)?$anis_0:null),(isset($anis_1)?$anis_1:null),(isset($anis_2)?$anis_2:null),(isset($anis_3)?$anis_3:null));

		}
		else{

			$loadClass->$method();
		}
		
		//echo $class."  ".$method;
	}

	public function checkRouteParameters()
	{

	}

	public function compulsoryParameters()
	{	//dd($this->routeToUse);
		$i=0;
		$pattern=$this->routeToUse['pattern'];
		$pattern=explode('/',$pattern);

		foreach ($pattern as $key => $value) {
			if(strpos($value,":") > -1){
				//echo $value;
				$i++;
				//echo $i;
			}
		}

		return $i;

	}

	public function givenParameter()
	{//	dd($this->parameter);
		return (count($this->parameter) > 0) ? count($this->parameter) : 0;
	}

	public function url($name,$para=[])
	{	
		$para=$para;
		$gg=$_SERVER['PHP_SELF'];
		$gg=str_replace('index.php',"", $gg); //tring to get any other folder where the app is . i am not depending on it being in the localhost
		$url="";
		$pattern=explode('/',(self::$route[$name]['pattern']));
		$i=1;
		foreach ($pattern as $key => $value) {
			if(strpos($value,":") > -1)
			{
				$url.=$para[0];
				unset($para[0]);
				$para=array_values($para);
			}
			else{

				$url.=$value;
				

			}
			//dd(count($pattern));
			if($i < count($pattern))
				{
					$url.="/";
				}

				$i++;
		}



		//dd($url);
		return "http://".self::getHost()."/".$url;
	}

	public static function redirect($url)
	{	//dd($url);
		header('location:'.$url);
	}

	public function checkMiddleWare()
	{

	}

	public function getAllMiddleWare()
	{
		//load the file 
		require_once "config.php";
		$this->middleware=$middleware;
		

	}

	public function getRouteMiddleWare()
	{
		return $this->routeToUse['middleware'];
	}

	public function loadMiddleWare()
	{	$pass=null;
		$this->getAllMiddleWare();
		$pass=false;
		foreach ($this->getRouteMiddleWare() as $key => $middleware) {
			$handle=new $this->middleware[$middleware];
			if($handle->handle()){
				//dd("yep") ;
				$pass[]=true;
			}
			else{
				//dd('nope');
				$pass[]=false;
				$handle->error();
			}
		}
		if(in_array(false,$pass))
		{
			return false;
		}
		else{
			return true;
		}
	}

	public function setCsrfToken()
	{
		if(session('_token') == null)
		{
			session(['_token'=>random_bytes(7)]);
		}
	}



}

?>