<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', 'objUsuario');
    }

    public function validar() { 
        $usuario = $this->input->post('username');
        $pass = $this->input->post('password');
        if ($this->objUsuario->autenticar($usuario, $pass)) {
            $data = array(
                'esta_logeado' => true,
                'IdUsuario' => $this->objUsuario->get_nUsuCodigo(),
                'cUsuUsuario' => $this->objUsuario->get_cUsuUsuario(),
                'Rol' => $this->objUsuario->getCRol(),
                'Nombres' => $this->objUsuario->getCPersona(),
                'IdPersona' => $this->objUsuario->get_nPerId(),
                //'TipoUsuario' => $this->objUsuario->get_cUsuTipo(),
                //'DescTipoUsuario' => $this->objUsuario->get_cUsuDescTipo(),
                //'IdSucursal'=>$this->objUsuario->get_nSurId(),
                //'Sucursal'=>$this->objUsuario->get_cSurNombre(),
            );
            //or $this->session->set_userdata('some_name', 'some_value');
            $this->session->set_userdata($data);
            echo "1";
        } else {
            echo "0";
        }
    }
}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */
?>