<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @jvinceso*/
/* Date : 29-04-2013 18:36:43 */
	class Modulo_model extends CI_Model {
		//Atributos de Clase
		private $nModId = '';
		private $cModModulo = '';
		private $nModOrden = '';
		private $cModIcono = '';

		//Constructor de Clase
		function __construct(){
			parent::__construct();
		}

		//FUNCIONES Set
		function set_nModId($nModId){
			$this->nModId = $nModId;
		}
		function set_cModModulo($cModModulo){
			$this->cModModulo = $cModModulo;
		}
		function set_nModOrden($nModOrden){
			$this->nModOrden = $nModOrden;
		}
		function set_cModIcono($cModIcono){
			$this->cModIcono = $cModIcono;
		}

		//FUNCIONES Get
		function get_nModId(){
			return $this->nModId;
		}
		function get_cModModulo(){
			return $this->cModModulo;
		}
		function get_nModOrden(){
			return $this->nModOrden;
		}
		function get_cModIcono(){
			return $this->cModIcono;
		}
		//Obtener Objeto MODULO
		function get_ObjModulo($CAMPO){
			$query = $this->db->query("SELECT * FROM modulo WHERE CAMPO=?", array($CAMPO));
			if ($query->num_rows() > 0){
				$row = $query->row();
				//CREANDO EL OBJETO
			}
		}
		public function getModulo(){
			$query = $this->db->query("CALL USP_S_MODULOS()");
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
	}
?>