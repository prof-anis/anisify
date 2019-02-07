<?php
$middleware=[

	//register your middleware here!

	// "name"=>class
	"auth"=>App\middleware\AuthMiddleware::class,
	'csrf'=>App\middleware\CsrfMiddleware::class


];

?>