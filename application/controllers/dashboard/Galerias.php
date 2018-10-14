<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galerias extends CI_Controller {
	public $sizes = [
				            'thumbs_x'      => 100,
				            'thumbs_y'      => 100,
				            'medium_x'      => 350,
				            'medium_y'      => 437,
				            'principal_x'   => 600,
				            'principal_y'   => 720
				        ];
				        
	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_galerias', 'Galeria');
        $this->load->model('dashboard/model_categorias', 'Categoria');
        $this->load->model('dashboard/model_productos', 'Producto');

    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function lista() {
		
		$id = (int) $this->uri->segment(4,0);

		//body
		$datapanel['body'] 		= 'galerias/lista';

		//data
		$datapanel['id_product'] 	= $id;
		$datapanel['dataset'] 	= $this->Galeria->getGaleryByProduct($id);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function edit() {

		$data = array();
		$id = (int) $this->uri->segment(4,0);
		if(! $id){ echo "no existe, ver lista"; exit();};

		#body
		$datapanel['body'] 		= 'galerias/editar';
		#data
		$datapanel['dataset'] 	= $this->Galeria->getGaleryById( $id );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}

		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {

		#body
		$datapanel['body'] 		= 'galerias/nuevo';
		#data
		$id = (int) $this->uri->segment(4,0);
		if(! $id){ echo "no existe, ver lista"; exit();};
		$exist = $this->Product->existProduct($id);
		if(! $exist){ echo "no existe, ver lista"; exit();};

		$datapanel['id'] 	= $id;
		$this->load->view("dashboard/includes/template", $datapanel);


	}

	public function save() {
		$data = $_POST;
		$data['estado'] = (bool) $data['estado'];


			#--------------------
			# Subida de Imagenes
			//print_r($data); exit();
			#
			if ( ! empty($_FILES["image"]['name']))
			{
			    $file = $_FILES["image"];
			    $nombre = $file["name"];
			    $tipo = $file["type"];
			    $ruta_provisional = $file["tmp_name"];
			    $size = $file["size"];
			    $dimensiones = getimagesize($ruta_provisional);
			    $width = $dimensiones[0];
			    $height = $dimensiones[1];
			    $carpeta = "files/product/";
			    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
				    {
				      echo "Error, el archivo no es una imagen"; exit();
				    }else{
				    	$src = $carpeta.$nombre;
			    		$uploaded = move_uploaded_file($ruta_provisional, $src);
				    }
				    if($uploaded){
				    		$data['imagen'] = $nombre;
					    	$saved = $this->Galeria->saveImagenGalery($data);
						    if($saved){
								$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
								header('Location: '.'list/'.$data['productos_id'], TRUE);

							}else{ echo "Se subió la foto pero no se grabo los datos";};

				    }else{ echo "No se pudo subir archivo"; exit();};
					//redirect('dashboards/galery/edit/'.$id);
			}
			# Fin Subida
			#--------------------
	}

	public function update() {
		$id = (int) $this->uri->segment(4,0);
		if(! $id){ echo "no existe, ver lista"; exit();};

		$data = $_POST;
		$imgant = $data['imgant'];
		$data['estado'] = (bool) $data['estado'];
		unset($data['imgant']);
		#--------------------
		# Subida de Imagenes
		#
		if ( ! empty($_FILES["image"]['name']))
		{
		    $file = $_FILES["image"];
		    $nombre = $file["name"];
		    $tipo = $file["type"];
		    $ruta_provisional = $file["tmp_name"];
		    $size = $file["size"];
		    $dimensiones = getimagesize($ruta_provisional);
		    $width = $dimensiones[0];
		    $height = $dimensiones[1];
		    $carpeta = "files/producto/";
		    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
			    {
			      echo "Error, el archivo no es una imagen"; 
			    }else{
			    	$src = $carpeta.$nombre;
		    		$uploaded = move_uploaded_file($ruta_provisional, $src);
			    }
			if($uploaded){
				$data['imagen'] = $nombre;
				@unlink('./files/producto/'.$imgant);
				};
		}
		# Fin Subida
		#--------------------
		//print_r($data); exit();
		$updated = $this->Galeria->updateGalery($id, $data);
		if($updated){
			$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
		}
		//redirect('dashboards/galery/edit/'.$id);
		header('Location: '.'../editar/'.$id, TRUE);
	}

	public function delete(){
		$id = $this->uri->segment(4,0);
		if(! $id){ echo "no existe, ver lista"; exit();};

        $galery = $this->Galeria->getGaleryById($id);
        $imagen= $galery['imagen'];
        @unlink('files/producto/'.$imagen);

        $result = $this->Galeria->deleteGalery($id);
        if($result) {
            $this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Se elimino correctamente.');
        }
        else {
            $this->session->set_flashdata('error', 'Se ha producido un error al intentar eliminar.');
        }
        //redirect('mainpanel/galery/listado');
        header('Location: '.'../lista/'.$galery['productos_id'], TRUE);

	}

}

