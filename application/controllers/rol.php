<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rol extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /*$this->load->model('usuario_model', 'objUsuario');
        
        $this->load->model('menu_model', 'ObjMenu');
        $this->load->model('permiso_model', 'ObjPermiso');
        $this->load->model('modulo_model', 'ObjModulo');
        $this->load->model('empresa_model', 'ObjEmpresa');*/
        $this->load->model('persona_model', 'ObjPersona');
        $this->load->model('rol_model', 'ObjRol');
    }
    
    /*public function cargaInformacionEmpresa() {
        $data['informacion'] = $this->ObjEmpresa->qryEmpresa();
        $datos['nombreEmpresa'] = $data['informacion'][0]['cEmpNombre'];
        $datos['logoEmpresa'] = $data['informacion'][0]['cEmpLogoGrande'];
        if ($datos['nombreEmpresa'] == "")
            $datos['nombreEmpresa'] = "empresa";
        if ($datos['logoEmpresa'] == "")
            $datos['logoEmpresa'] = "sinEmpresa.jpg";
        return $datos;
    }*/
    /*public function index() {
        //phpinfo();
        //exit();
        $this->loaders->verificaacceso();       
    }*/
    public function qryRolUsu() {
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
        } else {
            $tipo = '';
        }
        $data['listado'] = $this->ObjRol->qryRoles($tipo);
        //print_r($data);exit;
        $this->load->view("rol/qry_view", $data);
        //print_r($data);
    }
    /*public function getPermisos() {
        
        //echo "holaa";
        $pid = $this->input->post('pid');//id rol
        $rol = $this->input->post('rol');//id rol
        $this->session->set_userdata('pidx', $pid);//creo una sesion para el rol que he seleccionado
        $data['pid'] = $pid;
        $data['rol'] = $rol;
        $temp = array();
        $modulos = $this->ObjModulo->getModulo();
        //print_p($this->session->all_userdata());
        //print_p($modulos);exit();

        //$menusAsignados = $this->ObjPermiso->PermisosxUsuario($pid);
        $menusAsignados = $this->ObjPermiso->PermisosxRol($pid);
        foreach ($modulos as $key => $value) {
            $temp[$value['nModId']]['key'] = $value['nModId'];
            $temp[$value['nModId']]['title'] = $value['cModModulo'];
            
            $menu = $this->ObjMenu->getMenuxModulo($value['nModId']);
            $temp_menu = array();
            $i = 0;
            //print_r($menu);exit;
            foreach ($menu as $row) {
                if (search_in_array($row['nMenId'], $menusAsignados, 'nMenId')) {
                    $temp_menu[$i]['select'] = true;
                }
                $temp_menu[$i]['key'] = $row['nMenId'];
                $temp_menu[$i]['title'] = $row['cMenMenu'];
                $i++;
            }
            $temp[$value['nModId']]['isFolder'] = true;
            $temp[$value['nModId']]['children'] = $temp_menu;
        }
        //print_p($temp);exit;
        $data['permisos'] = $temp;
        $this->load->view('usuario/permisos_view', $data);
    }*/

    

}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */
?>