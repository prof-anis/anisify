<?php
namespace utilities\view;
use utilities\view\lib\Bladeone;
/**
 * 
 */
class View 
{
	
	public static function loadView($file,$arg=[])
	{	
		$views = dirname(dirname(dirname(__FILE__)))."/app/views"; // it uses the folder /views to read the templates
		$cache = __DIR__ . '/cache'; // it uses the folder /cache to compile the result. 

		$blade=new BladeOne($views,$cache,BladeOne::MODE_AUTO);
		$blade->setBaseUrl(ResourcePath);
		echo $blade->run($file,compact($arg));
		exit;
	}
}

?>