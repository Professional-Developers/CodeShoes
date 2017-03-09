<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Persona_model extends CI_Model {

    //Atributos de Clase
    private $nPerId = '';
    private $cPerNombres = '';
    private $cPerApellidoPaterno = '';
    private $cPerApellidoMaterno = '';
    private $cPerDni = '';
    private $cPerDireccion = '';
    private $cPerTelefono = '';
    private $cPerCelular = '';
    private $cPerEstado = '';
    private $tPerFechaRegistro = '';
    private $tPerFechaBaja = '';
    //private $nSurId = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set
    function set_nPerId($nPerId) {
        $this->nPerId = $nPerId;
    }

    function set_cPerNombres($cPerNombres) {
        $this->cPerNombres = $cPerNombres;
    }

    function set_cPerApellidoPaterno($cPerApellidoPaterno) {
        $this->cPerApellidoPaterno = $cPerApellidoPaterno;
    }

    function set_cPerApellidoMaterno($cPerApellidoMaterno) {
        $this->cPerApellidoMaterno = $cPerApellidoMaterno;
    }

    function set_cPerDni($cPerDni) {
        $this->cPerDni = $cPerDni;
    }

    function set_cPerDireccion($cPerDireccion) {
        $this->cPerDireccion = $cPerDireccion;
    }

    function set_cPerTelefono($cPerTelefono) {
        $this->cPerTelefono = $cPerTelefono;
    }

    function set_cPerCelular($cPerCelular) {
        $this->cPerCelular = $cPerCelular;
    }

    function set_cPerEstado($cPerEstado) {
        $this->cPerEstado = $cPerEstado;
    }

    function set_tPerFechaRegistro($tPerFechaRegistro) {
        $this->tPerFechaRegistro = $tPerFechaRegistro;
    }

    function set_tPerFechaBaja($tPerFechaBaja) {
        $this->tPerFechaBaja = $tPerFechaBaja;
    }

//    function setNSurId($nSurId) {
//        $this->nSurId = $nSurId;
//    }

    //FUNCIONES Get
    function get_nPerId() {
        return $this->nPerId;
    }

    function get_cPerNombres() {
        return $this->cPerNombres;
    }

    function get_cPerApellidoPaterno() {
        return $this->cPerApellidoPaterno;
    }

    function get_cPerApellidoMaterno() {
        return $this->cPerApellidoMaterno;
    }

    function get_cPerDni() {
        return $this->cPerDni;
    }

    function get_cPerDireccion() {
        return $this->cPerDireccion;
    }

    function get_cPerTelefono() {
        return $this->cPerTelefono;
    }

    function get_cPerCelular() {
        return $this->cPerCelular;
    }

    function get_cPerEstado() {
        return $this->cPerEstado;
    }

    function get_tPerFechaRegistro() {
        return $this->tPerFechaRegistro;
    }

    function get_tPerFechaBaja() {
        return $this->tPerFechaBaja;
    }

     public function qryPersonas($opt = '') {
        $query = $this->db->query("CALL USP_PER_S('" . $opt . "')");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    
    
    
    
    
    
    
//    function getNSurId() {
//        return $this->nSurId;
//    }

    function get_datatables() {
        //$this->_get_datatables_query();
        $sql = "";
        $limite = "";
        if ($_POST['length'] != -1) {
            $sql = "select * from persona";
            //$limite = " limit ".$_POST['length'].",".$_POST['start'];
            $limite = " limit " . $_POST['start'] . "," . $_POST['length'];
        } else {
            $limite = " limit " . $_POST['length'];
        }
        $sql = "select * from persona " . $limite;

        //$query = $this->db->query('select * from persons');


        /* if($_POST['length'] != -1)
          $this->db->limit($_POST['length'], $_POST['start']);
          $query = $this->db->get(); */

        $query = $this->db->query($sql);

        return $query->result();
    }

    function count_filtered() {
        /*$this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();*/
        $sql= "select * from persona";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function count_all() {
        /*$this->db->from($this->table);
        return $this->db->count_all_results();*/
        //$sql= "select * from persona";
        $sql= "select * from persona";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    

    //Obtener Objeto PERSONA
    function get_ObjPersona($CAMPO) {
        $query = $this->db->query("SELECT * FROM persona WHERE CAMPO=?", array($CAMPO));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //CREANDO EL OBJETO
        }
    }

    //Insertar PERSONA
    function registrarPersonaIns() {
        $query = $this->db->query("CALL USP_PER_I_PERSONA('" . $this->get_cPerNombres() . "','" . $this->get_cPerApellidoPaterno() . "','" . $this->get_cPerApellidoMaterno() . "','" . $this->get_cPerDni() . "','" . $this->get_cPerDireccion() . "','" . $this->get_cPerTelefono() . "','" . $this->get_cPerCelular() . "')");
        return $query;
        /* 			if ($query->num_rows() > 0){
          $row = $query->row();
          //CREANDO EL OBJETO
          } */
    }

    function getCboPersonas() {//comite
        //$query = "call USP_PER_S_PERSONAS()";
        //$query = "call USP_CLU_S_PERSONAS_ACTIVAS()";
        $query = "call USP_SIS_S_PERSONAS_ACTIVAS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function qryPersona() {
        $query = "call USP_SIS_S_PERSONAS()";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

   

    function eliminarPersona($ncodigo) {
        $query = "call USP_SIS_D_PERSONA(" . $ncodigo . ")";
        $query2 = $this->db->query($query);
        return $query2;
    }

    function getDatos($idper) {
        $query = "call USP_SIS_S_PERSONA_GET('" . $idper . "')";
        $query2 = $this->db->query($query);
        if ($query2->num_rows() > 0) {
            return $query2->result_array(); //sirve para mandar los datos
        } else {
            return false;
        }
    }

    function updPersona($hdnidper) {
        $query = $this->db->query("CALL USP_SIS_U_PERSONA('" . $this->get_cPerNombres() . "','" . $this->get_cPerApellidoPaterno() . "','" . $this->get_cPerApellidoMaterno() . "','" . $this->get_cPerDni() . "','" . $this->get_cPerDireccion() . "','" . $this->get_cPerTelefono() . "','" . $this->get_cPerCelular() . "'," . $hdnidper . ",'" . $this->getNSurId() . "')");
        return $query;
    }

    /* function qryClub() {
      $query = "call USP_CLU_S_CLUB()";
      $query2 = $this->db->query($query);
      if ($query2->num_rows() > 0) {
      return $query2->result_array(); //sirve para mandar los datos
      } else {
      return false;
      }
      } */

    public function buscaxDniGet() {
        $sql = "CALL USP_PER_S_DNI('" . $this->get_cPerDni() . "');";
        // echo $sql;
        // exit();
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

}

?>