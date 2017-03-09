<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', 'objUsuario');
        $this->load->model('menu_model', 'ObjMenu');
        $this->load->model('empresa_model', 'ObjEmpresa');
        $this->load->model('rol_model', 'ObjRol');
        $this->load->model('persona_model', 'ObjPersona');
        //$this->load->model('permiso_model', 'ObjPermiso');
        //$this->load->model('modulo_model', 'ObjModulo');
    }
    public function index() {
        $this->loaders->verificaacceso();
        $datos[] = $this->cargaInformacionEmpresa();
        $this->load->view('layout/header',$datos[0]);
        $data['cbo']= $this->ObjRol->getCboTipoRol('CBO');
        $this->load->view('usuario/panel_view', $data);
        $this->load->view('layout/footer');
    }
    
    public function cargaInformacionEmpresa() {
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $datos['informacion'] = $data['informacion'];
        $datos['nombreEmpresa'] = $data['informacion'][0]['cEmpNombre'];
        $datos['logoEmpresa'] = $data['informacion'][0]['cEmpLogoGrande'];
        if ($datos['nombreEmpresa'] == "")
            $datos['nombreEmpresa'] = "empresa";
        if ($datos['logoEmpresa'] == "")
            $datos['logoEmpresa'] = "sinEmpresa.jpg";
        return $datos;
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
            );
            $this->session->set_userdata($data);
            echo "1";
        } else {
            echo "0";
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect("/");
    }
    
    public function qryPersonaUsu() {
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
        } else {
            $tipo = '';
        }
        $data['listado'] = $this->ObjPersona->qryPersonas($tipo);
        $this->load->view("usuario/qry_view", $data);
    }
}
?>