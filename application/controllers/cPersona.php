<?php 

/**
* 
*/
class CPersona extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mPersona');
		$this->load->model('mUsuario');
	}

	public function index(){
		$this->load->view('persona/vRegistroPersona');
	}

	public function guardar(){
		$param['cPerNombres'] = $this->input->post('txtNombres');
		$param['cPerApellidoPaterno'] = $this->input->post('txtApellidoPaterno');
		$param['cPerApellidoMaterno'] = $this->input->post('txtApellidoMaterno');
		$param['cPerDireccion'] = $this->input->post('txtDireccion');
		$param['cPerDni'] = $this->input->post('txtDni');

		$paramUsu['nPerId'] = $this->mPersona->guardar($param);
		$paramUsu['cUsuUsuario'] = $this->input->post('txtUsuario');
		$paramUsu['cUsuClave'] = $this->encrypt->sha1($this->input->post('txtContrasenia'));
		
		$this->mUsuario->guardar($paramUsu);

	}
}