<?php 

/**
* 
*/
class Mlogin extends CI_Model
{
	public function ingresar($params){
		$this->db->select('u.nUsuCodigo,p.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno');
		$this->db->from('persona p');
		$this->db->join('usuario u','p.nPerId = u.nPerId');
		$this->db->where('u.cUsuUsuario',$params['usuario']);
		$this->db->where('u.cUsuClave',$params['contrasenia']);

		$datos = $this->db->get();

		if ($datos->num_rows() == 1) {
			$s_usuario = array(
				's_nUsuCodigo' => $datos->row()->nUsuCodigo,
				's_usuario' => $datos->row()->cPerNombres." ".$datos->row()->cPerApellidoPaterno
				);
			$this->session->set_userdata($s_usuario);
			
			return 1;
		}else{
			return 0;
		}
	}
}