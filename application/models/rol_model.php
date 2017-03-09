<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Rol_model extends CI_Model {

    //Atributos de Clase
    private $nIdRol='';
    private $cNombre='';
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }
    
    //FUNCIONES Set y Get
    public function getNIdRol() {
        return $this->nIdRol;
    }

    public function getCNombre() {
        return $this->cNombre;
    }

    public function setNIdRol($nIdRol) {
        $this->nIdRol = $nIdRol;
    }

    public function setCNombre($cNombre) {
        $this->cNombre = $cNombre;
    }
    
    function getCboTipoRol($opt = ''){
        $query = $this->db->query("CALL USP_ROL_S_ROLES('" . $opt . "')");
        if ($query->num_rows() > 0) {
            //return $result->result_array();
            $res = $query->result_array(); //sirve para mandar los datos
            $query->next_result();
            $query->free_result();
            return $res;
        } else {
            return null;
        }
    }
    public function qryRoles($opt = '') {
        $query = $this->db->query("CALL USP_ROL_S_ROLES('" . $opt . "')");
        if ($query->num_rows() > 0) {
            //return $query->result_array();
            $res = $query->result_array(); //sirve para mandar los datos
            $query->next_result();
            $query->free_result();
            return $res;
        } else {
            return null;
        }
    }
    

}

?>