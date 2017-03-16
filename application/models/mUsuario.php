<?php 

/**
* 
*/
class MUsuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function guardar($paramUsu){
		$this->db->insert('usuario',$paramUsu);
	}

}