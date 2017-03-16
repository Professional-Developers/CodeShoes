<?php 

/**
* 
*/
class Mpersona extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function guardar($param){
		$this->db->insert('persona',$param);
		return $this->db->insert_id();
	}

}