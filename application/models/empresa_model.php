<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 01-05-2013 19:17:17 */

class Empresa_model extends CI_Model {

    //Atributos de Clase
    private $nEmpId = '';
    private $cEmpNombre= '';
    private $cEmpDescripcion='';
    private $cEmpDireccionFiscal='';
    private $cEmpTelefono='';
    private $cEmpCelular='';
    private $cEmpEmail='';
    private $cEmpRuc='';
    private $nIdRubro='';
    private $cEmpLogoChico='';
    private $cEmpLogoGrande='';
    private $cEmpLogoFondo='';
    private $nEmpPropia='';
    private $cEmpEstado='';
    
    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }
    
    //FUNCIONES Set y Get
    public function getNEmpId() {
        return $this->nEmpId;
    }

    public function setNEmpId($nEmpId) {
        $this->nEmpId = $nEmpId;
    }

    public function getCEmpNombre() {
        return $this->cEmpNombre;
    }

    public function setCEmpNombre($cEmpNombre) {
        $this->cEmpNombre = $cEmpNombre;
    }

    public function getCEmpDescripcion() {
        return $this->cEmpDescripcion;
    }

    public function setCEmpDescripcion($cEmpDescripcion) {
        $this->cEmpDescripcion = $cEmpDescripcion;
    }

    public function getCEmpDireccionFiscal() {
        return $this->cEmpDireccionFiscal;
    }

    public function setCEmpDireccionFiscal($cEmpDireccionFiscal) {
        $this->cEmpDireccionFiscal = $cEmpDireccionFiscal;
    }

    public function getCEmpTelefono() {
        return $this->cEmpTelefono;
    }

    public function setCEmpTelefono($cEmpTelefono) {
        $this->cEmpTelefono = $cEmpTelefono;
    }

    public function getCEmpCelular() {
        return $this->cEmpCelular;
    }

    public function setCEmpCelular($cEmpCelular) {
        $this->cEmpCelular = $cEmpCelular;
    }

    public function getCEmpEmail() {
        return $this->cEmpEmail;
    }

    public function setCEmpEmail($cEmpEmail) {
        $this->cEmpEmail = $cEmpEmail;
    }

    public function getCEmpRuc() {
        return $this->cEmpRuc;
    }

    public function setCEmpRuc($cEmpRuc) {
        $this->cEmpRuc = $cEmpRuc;
    }

    public function getNIdRubro() {
        return $this->nIdRubro;
    }

    public function setNIdRubro($nIdRubro) {
        $this->nIdRubro = $nIdRubro;
    }

    public function getCEmpLogoChico() {
        return $this->cEmpLogoChico;
    }

    public function setCEmpLogoChico($cEmpLogoChico) {
        $this->cEmpLogoChico = $cEmpLogoChico;
    }

    public function getCEmpLogoGrande() {
        return $this->cEmpLogoGrande;
    }

    public function setCEmpLogoGrande($cEmpLogoGrande) {
        $this->cEmpLogoGrande = $cEmpLogoGrande;
    }

    public function getCEmpLogoFondo() {
        return $this->cEmpLogoFondo;
    }

    public function setCEmpLogoFondo($cEmpLogoFondo) {
        $this->cEmpLogoFondo = $cEmpLogoFondo;
    }

    public function getNEmpPropia() {
        return $this->nEmpPropia;
    }

    public function setNEmpPropia($nEmpPropia) {
        $this->nEmpPropia = $nEmpPropia;
    }

    public function getCEmpEstado() {
        return $this->cEmpEstado;
    }

    public function setCEmpEstado($cEmpEstado) {
        $this->cEmpEstado = $cEmpEstado;
    }
    /*Obtener Empresa*/
    function qryEmpresa() {
        $Datos[0] = 1; //1
        $query2 = $this->db->query("CALL USP_EMP_S_EMPRESAS(?)", $Datos);
        if ($query2->num_rows() > 0) {
            //return $query2->result_array(); //sirve para mandar los datos
            $res = $query2->result_array(); //sirve para mandar los datos
            $query2->next_result();
            $query2->free_result();
            return $res;
        } else {
            return false;
        }
    }    
  

}

?>