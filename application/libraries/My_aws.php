<?php
// +------------------------------------------------------------------------+
// | My_aws.php                                                             |
// +------------------------------------------------------------------------+
// | Copyright (c) Victor Molina 2003-2009. All rights reserved.            |
// | Version       1.0                                                      |
// | Last modified 21/07/2017                                               |
// | Email         victorisaacmolinasencios@gmail.com                       |
// | Web           http://www.isaacmolina.com                               |
// +------------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify   |
// | it under the terms of the GNU General Public License version 2 as      |
// | published by the Free Software Foundation.                             |
// +------------------------------------------------------------------------+
//

/**
 * Class upload
 *
 * @version   1.0
 * @author    isaac molina <isaacmolina.com>
 * @copyright victor isaac molina asencios
 */


use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
require _LIBRARIESPATH.'aws/vendor/autoload.php';
class My_aws {

	private $s3; 
	private $config; 
	public function __construct()
	{
		$this->config = array(
					's3'=>[
						'key'=>'AKIAJ6RLYXR36QCKQIXQ',
						'secret'=>'fX6OnfGzhXPDR0g+FFtU0YDUnBmViaqp4HgBOdiG',
						//'region'=>'us-east-1', //para usar la ultima version del appi
						'bucket'=>'newcmsimagenes'
					]);
		$this->s3 = S3Client::factory([
				'key'=> $this->config['s3']['key'],
				'secret'=> $this->config['s3']['secret']
			]);

	}
	function uploadAws( $file_uploaded = '',$carpeta='', $name='') {

        if( is_readable($file_uploaded)){

			$ext = explode('.', $file_uploaded);
			$ext = end($ext);
			$name = ( ! empty($name) ? $name : date("YmdHis").$ext);

		        try{
					$fil = $this->s3->putObject([
						'Bucket'=>$this->config['s3']['bucket'],
						'Key'=>"$carpeta$name",
						'Body'=>fopen( $file_uploaded, 'rb'),
						'ACL'=>'public-read'
					]);
					//print_r($s3);
					$fil = (array) $fil;
					$fil = array_values($fil);
					$file_path_uploaded = $fil[1]['ObjectURL'];
					return ['status' =>200, 'file' =>$file_path_uploaded];
				}catch(S3Exception $e){
					//die('a ocurrido un error al subir el archivo');
        			return ['status' =>400, 'error' =>'error de libreria'];
				}

        	
        }else{
        	return ['status' =>400, 'error' =>'no existe el archivo'];
        }

    }
}

?>
