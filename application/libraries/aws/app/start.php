<?php 

use Aws\S3\S3Client;
require _LIBRARIESPATH.'aws/vendor/autoload.php';
$config = require('config.php');


//S3

 $s3 = S3Client::factory([
		'key'=> $config['s3']['key'],
		'secret'=> $config['s3']['secret']
	]);

//print_r($s3); //exit();
print_r('comienzo'); //exit();