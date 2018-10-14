<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*use Culqi\Culqi;
require_once('culqi/lib/Requests-master/library/Requests.php');
Requests::register_autoloader();
require_once('culqi/lib/culqi.php');*/
class My_Culqi {
	
	public function __constructor()
	{
		require_once('culqi/Requests-master/library/Requests.php');
		Requests::register_autoloader();
		require_once('culqi/lib/culqi.php');
		//use Culqi\Culqi;
	}
	//
}
?>