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
        $this->load->model('permisorol_model', 'ObjPermiso');
        $this->load->model('modulo_model', 'ObjModulo');
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
    
        public function setPermisosRolIns() {
        date_default_timezone_set('America/Lima');
        $pid = $this->input->post('pid');
        $id = $this->input->post('ids');
        //$menusAsignados = $this->ObjPermiso->PermisosxUsuario($pid);
        $menusAsignados = $this->ObjPermiso->PermisosxRol($pid);
        $sql_permisos = "";
        //$sql_insert = "INSERT INTO permiso(nUsuCodigo,nMenId,cPermActivo) VALUES";
        $sql_insert = "INSERT INTO permisorol(nIdRol,nMenId,cPermActivo) VALUES";
        $sql_permisos_quitar = array();
        $values = "";
//         var_dump(count($menusAsignados));
//         print_p($id);exit();
        if (is_array($id)) {
            foreach ($id as $i => $valor) {
                if (is_array($menusAsignados)) {
                    if (!search_in_array($valor, $menusAsignados, 'nMenId')) {
                        $values .= "($pid,$valor,1),";
                    }
                } else {
                    $values .= "($pid,$valor,1),";
                }
            }
        }

        if (is_array($menusAsignados)) {
            foreach ($menusAsignados as $key => $row) {
                $fecha_actual = date('Y-m-d H:i:s', time());
                if (is_array($id)) {
                    if (!in_array($row['nMenId'], $id)) {
                        //$sql_permisos_quitar[] = "UPDATE permiso set cPermActivo=0,dPermFechaFin='$fecha_actual' where nUsuCodigo=$pid AND nMenId=" . $row['nMenId'] . ";";
                        $sql_permisos_quitar[] = "UPDATE permisorol set cPermActivo=0,dPermFechaFin='$fecha_actual' where nIdRol=$pid AND nMenId=" . $row['nMenId'] . ";";
                    }
                } else {
                    //$sql_permisos_quitar[] = "UPDATE permiso set cPermActivo=0,dPermFechaFin='$fecha_actual' where nUsuCodigo=$pid AND nMenId=" . $row['nMenId'] . ";";
                    $sql_permisos_quitar[] = "UPDATE permisorol set cPermActivo=0,dPermFechaFin='$fecha_actual' where nIdRol=$pid AND nMenId=" . $row['nMenId'] . ";";
                }
            }
        }
        $rpt = "1";
        if (trim($values) != "") {
            $sql_permisos .= $sql_insert . substr($values, 0, -1) . ';';
            // print_p($sql_permisos);
            // print_p($sql_permisos_quitar);
            // exit();
            //if ($this->ObjPermiso->PermisosIns($sql_permisos)) {
            if ($this->ObjPermiso->PermisosIns($sql_permisos)) {
                $rpt = "1";
            }
        }
        if (count($sql_permisos_quitar) > 0) {
            // print("sql_permisos");
            // print_p($sql_permisos);
            // print_p($sql_permisos_quitar);
            // exit();
            $this->ObjPermiso->PermisosxUsuarioUpd($sql_permisos_quitar);
            $rpt = "1";
        } else {
            
        }
        echo $rpt;
    }
    
    public function updatePass() {
        $idusu = $this->input->post('idUsu');
        //$clave = md5("+".$this->input->post('clave'));
        $clave = $this->input->post('clave');
        $rol = $this->input->post('rol');
        //print_r($_POST);exit;
        if ($this->objUsuario->updateclave($idusu, $clave, $rol)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function insUsuario() {
        //$clave = md5("+".$this->input->post('txtClave'));
        $clave = $this->input->post('txtClave');
        $this->objUsuario->set_nPerId($this->input->post('txt_nPerId'));
        $this->objUsuario->set_cUsuUsuario($this->input->post('txtUsuario'));
        $this->objUsuario->set_cUsuClave($clave);
        //$this->objUsuario->set_cUsuTipo($this->input->post('cboTipoUser'));
        $this->objUsuario->setNIdRol($this->input->post('nIdRol'));
        $rs = $this->objUsuario->insUsuario();
        // print_r($rs);
        // var_dump($rs);
        if ($rs) {
            echo "1";
        } else {
            echo "bad";
        }
    }
    
    /*
    public function setPermisosIns() {
        date_default_timezone_set('America/Lima');
        $pid = $this->input->post('pid');
        $id = $this->input->post('ids');
        $menusAsignados = $this->ObjPermiso->PermisosxUsuario($pid);
        $sql_permisos = "";
        $sql_insert = "INSERT INTO permiso(nUsuCodigo,nMenId,cPermActivo) VALUES";
        $sql_permisos_quitar = array();
        $values = "";
        if (is_array($id)) {
            foreach ($id as $i => $valor) {
                if (is_array($menusAsignados)) {
                    if (!search_in_array($valor, $menusAsignados, 'nMenId')) {
                        $values .= "($pid,$valor,1),";
                    }
                } else {
                    $values .= "($pid,$valor,1),";
                }
            }
        }
        if (is_array($menusAsignados)) {
            foreach ($menusAsignados as $key => $row) {
                $fecha_actual = date('Y-m-d H:i:s', time());
                if (is_array($id)) {
                    if (!in_array($row['nMenId'], $id)) {
                        $sql_permisos_quitar[] = "UPDATE permiso set cPermActivo=0,dPermFechaFin='$fecha_actual' where nUsuCodigo=$pid AND nMenId=" . $row['nMenId'] . ";";
                    }
                } else {
                    $sql_permisos_quitar[] = "UPDATE permiso set cPermActivo=0,dPermFechaFin='$fecha_actual' where nUsuCodigo=$pid AND nMenId=" . $row['nMenId'] . ";";
                }
            }
        }
        $rpt = "1";
        if (trim($values) != "") {
            $sql_permisos .= $sql_insert . substr($values, 0, -1) . ';';
            if ($this->ObjPermiso->PermisosIns($sql_permisos)) {
                $rpt = "1";
            }
        }
        if (count($sql_permisos_quitar) > 0) {
            $this->ObjPermiso->PermisosxUsuarioUpd($sql_permisos_quitar);
            $rpt = "1";
        } else {
            
        }
        echo $rpt;
    }*/
}
?>