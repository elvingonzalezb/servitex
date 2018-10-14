<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Phpmailer {
	
	public function __construct()
	{
		require_once('phpmailer/class.phpmailer.php');
		require_once "phpmailer/PHPMailerAutoload.php";
	}
	
}
?>