<?php  
	use Aws\S3\Exception\S3Exception;
	require 'app/start.php'; 

	if( isset($_FILES['file']) ){
		//print_r(isset($_FILES['file'])); exit();
		$file = $_FILES['file'];

		$name = $file['name'];
		$tmp_name = $file['tmp_name'];

		$extencion = explode('.', $name);
		$extencion = end($extencion);

		$key = md5(uniqid());

		$tmp_file_name = "{$key}.{$extencion}";
		$tmp_file_path = "files/{$tmp_file_name}";

		move_uploaded_file($tmp_name, $tmp_file_path);
		//Subida con AWS
		try{
			$fil = $s3->putObject([
				'Bucket'=>$config['s3']['bucket'],
				'Key'=>"uploads/$name",
				'Body'=>fopen( $tmp_file_path, 'rb'),
				'ACL'=>'public-read'
			]);
			//print_r($s3);
			$fil = (array) $fil;
			$fil = array_values($fil);
			print_r($fil[1]['ObjectURL']);
		}catch(S3Exception $e){
			die('a ocurrido un error al subir el archivo');
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" value="Enviar">
</form>
</body>
</html>