<?php 

/**
* 
*/
class Clogin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mLogin');
	}

	public function index(){
		$this->load->view('vLogin');
	}

	public function ingresar(){
		$params['usuario'] = $this->input->post('txtUsuario');
		$params['contrasenia'] = sha1($this->input->post('txtContrasenia'));
		$datos = $this->mLogin->ingresar($params);

		if ($datos == 1) {
			$this->load->view('dashboard/vAdministracion');
		}else{
			$this->load->view('vLogin');
		}
	}
}
