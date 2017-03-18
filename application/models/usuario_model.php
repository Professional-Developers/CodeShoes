<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Autogenered Developed by @jvinceso */
/* Date : 29-04-2013 18:36:43 */

class Usuario_model extends CI_Model {

    //Atributos de Clase
    private $nUsuCodigo = '';
    private $nPerId = '';
    private $cUsuUsuario = '';
    private $cUsuClave = '';
    private $cUsuEstado = '';
    private $cUsuTipo = '';
    private $cUsuDescTipo = '';
    private $nSurId = '';
    private $cSurNombre = '';
    private $nIdRol = '';
    private $cRol = '';
    private $cPersona = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set
    function set_nUsuCodigo($nUsuCodigo) {
        $this->nUsuCodigo = $nUsuCodigo;
    }

    function set_nPerId($nPerId) {
        $this->nPerId = $nPerId;
    }

    function set_cUsuUsuario($cUsuUsuario) {
        $this->cUsuUsuario = $cUsuUsuario;
    }

    function set_cUsuClave($cUsuClave) {
        $this->cUsuClave = $cUsuClave;
    }

    function set_cUsuEstado($cUsuEstado) {
        $this->cUsuEstado = $cUsuEstado;
    }

    function set_cUsuTipo($cUsuTipo) {
        $this->cUsuTipo = $cUsuTipo;
    }

    function set_cUsuDescTipo($cUsuDescTipo) {
        $this->cUsuDescTipo = $cUsuDescTipo;
    }

    function set_nSurId($nSurId) {
        $this->nSurId = $nSurId;
    }

    function set_cSurNombre($cSurNombre) {
        $this->cSurNombre = $cSurNombre;
    }

    function setNIdRol($nIdRol) {
        $this->nIdRol = $nIdRol;
    }

    function setCRol($cRol) {
        $this->cRol = $cRol;
    }

    function setCPersona($cPersona) {
        $this->cPersona = $cPersona;
    }

    //FUNCIONES Get
    function get_nUsuCodigo() {
        return $this->nUsuCodigo;
    }

    function get_nPerId() {
        return $this->nPerId;
    }

    function get_cUsuUsuario() {
        return $this->cUsuUsuario;
    }

    function get_cUsuClave() {
        return $this->cUsuClave;
    }

    function get_cUsuEstado() {
        return $this->cUsuEstado;
    }

    function get_cUsuTipo() {
        return $this->cUsuTipo;
    }

    function get_cUsuDescTipo() {
        return $this->cUsuDescTipo;
    }

    function get_nSurId() {
        return $this->nSurId;
    }

    function get_cSurNombre() {
        return $this->cSurNombre;
    }

    function getNIdRol() {
        return $this->nIdRol;
    }

    function getCRol() {
        return $this->cRol;
    }
    
    function getCPersona() {
        return $this->cPersona;
    }

    function autenticar($usuario, $clave) {
        $query = $this->db->query("SELECT U.*,r.cNombre as rol FROM usuario U
                INNER JOIN persona P ON P.nPerId=U.nPerId 
                INNER JOIN rol r on r.nIdRol=u.nIdRol 
                WHERE 
                P.cPerEstado=1 AND
                U.cUsuUsuario=? AND U.cUsuClave=? limit 1"
                , array(trim($usuario), trim($clave)));
      
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->get_ObjUsuario($row->nUsuCodigo);
            return true;
        }
        return false;
    }
    
    //Obtener Objeto USUARIO
    function get_ObjUsuario($nUsuCodigo) {
        $query = $this->db->query("select u.*,r.cNombre as Rol,CONCAT(p.cPerNombres, ' ', p.cPerApellidoPaterno) As Nombre
                                           from usuario u 
                                           inner join rol r on r.nIdRol=u.nIdRol
                                           inner join persona p on p.nPerId=u.nPerId
                                           where nUsuCodigo=?", array($nUsuCodigo));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->set_nUsuCodigo($row->nUsuCodigo);
            $this->set_nPerId($row->nPerId);
            $this->set_cUsuUsuario($row->cUsuUsuario);
            $this->set_cUsuClave($row->cUsuClave);
            $this->set_cUsuEstado($row->cUsuEstado);
            $this->setCRol($row->Rol);
            $this->setCPersona($row->Nombre);
        }
    }
    
    public function updateclave($idusu, $clave, $rol) {
        $sql = "UPDATE usuario SET cUsuClave='" . trim($clave) . "', nIdRol='" . trim($rol) . "' WHERE nUsuCodigo = $idusu";
        // echo $sql;exit();
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;
    }
    public function insUsuario() {
        $sql = "CALL USP_USU_I_REGISTRAR('" . $this->get_nPerId() . "','" . $this->get_cUsuUsuario() . "','" . $this->get_cUsuClave() . "','" . $this->getNIdRol() . "')";
        $query = $this->db->query($sql);
        return $query;
    }
}

?>