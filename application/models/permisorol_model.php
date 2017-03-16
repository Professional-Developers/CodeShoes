<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @jvinceso*/
/* Date : 29-04-2013 18:36:43 */
	class Permisorol_model extends CI_Model {
		//Atributos de Clase
		private $nPermId = '';
		private $nUsuCodigo = '';
		private $nMenId = '';
		private $dPermFechaInicio = '';
		private $dPermFechaFin = '';
		private $cPermActivo = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nPermId($nPermId){
			$this->nPermId = $nPermId;
		}
		function set_nUsuCodigo($nUsuCodigo){
			$this->nUsuCodigo = $nUsuCodigo;
		}
		function set_nMenId($nMenId){
			$this->nMenId = $nMenId;
		}
		function set_dPermFechaInicio($dPermFechaInicio){
			$this->dPermFechaInicio = $dPermFechaInicio;
		}
		function set_dPermFechaFin($dPermFechaFin){
			$this->dPermFechaFin = $dPermFechaFin;
		}
		function set_cPermActivo($cPermActivo){
			$this->cPermActivo = $cPermActivo;
		}

		//FUNCIONES Get
		function get_nPermId(){
			return $this->nPermId;
		}
		function get_nUsuCodigo(){
			return $this->nUsuCodigo;
		}
		function get_nMenId(){
			return $this->nMenId;
		}
		function get_dPermFechaInicio(){
			return $this->dPermFechaInicio;
		}
		function get_dPermFechaFin(){
			return $this->dPermFechaFin;
		}
		function get_cPermActivo(){
			return $this->cPermActivo;
		}
		//Obtener Objeto PERMISO
		function get_ObjPermiso($CAMPO){
			$query = $this->db->query("SELECT * FROM PERMISO WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}
		public function PermisosxUsuario($nUsuCodigo){
			$query = $this->db->query("CALL USP_S_PERMISOS_USUARIO($nUsuCodigo);");
			if ($query->num_rows() > 0){
				//return $query->result_array();
                            $res = $query->result_array(); //sirve para mandar los datos
                            $query->next_result();
                            $query->free_result();
                            return $res;
			}else{
				return false;
			}
		}
                
                public function PermisosxRol($nUsuCodigo){
			$query = $this->db->query("CALL USP_S_PERMISOS_ROL($nUsuCodigo);");
			if ($query->num_rows() > 0){
				//return $query->result_array();
                                $res = $query->result_array(); //sirve para mandar los datos
                                $query->next_result();
                                $query->free_result();
                                return $res;
			}else{
                                $query->next_result();
                                $query->free_result();
				return false;
			}
		}
                
                
		public function PermisosxUsuarioUpd($arrayUpdate){
			foreach ($arrayUpdate as $key => $sql) {
				$this->db->query($sql);
			}
		}
		public function PermisosIns($insertSql){
			if( $this->db->query($insertSql) ){
				return true;
			}else{
				return false;
			}
		}
	}
?>