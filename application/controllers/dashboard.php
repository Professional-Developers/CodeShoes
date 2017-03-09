<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('empresa_model', 'ObjEmpresa');
    }

    public function index() {
        //print_r($this->session->userdata); 
        $this->loaders->verificaAcceso();
        //$data['title'] = PROJECT;
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $data['nombreEmpresa'] = $data['informacion'][0]['cEmpNombre'];
        $data['logoEmpresa'] = $data['informacion'][0]['cEmpLogoGrande'];
        //print_r($data);exit;
        $this->load->view('layout/dashboard', $data);
    }
/*
    public function cargaInformacionEmpresa() {
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $datos['nombreEmpresa'] = $data['informacion'][0]['cEmpNombre'];
        $datos['logoEmpresa'] = $data['informacion'][0]['cEmpLogoGrande'];
        if ($datos['nombreEmpresa'] == "")
            $datos['nombreEmpresa'] = "empresa";
        if ($datos['logoEmpresa'] == "")
            $datos['logoEmpresa'] = "sinEmpresa.jpg";
        return $datos;
    }*/

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
?>