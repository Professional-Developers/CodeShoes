<?php
class Loaders {
    //CREA MENU DE OPCIONES
    public function get_menu() {
        $CI = & get_instance();
        $CI->load->model('menu_model', 'objMenu');
        $url = $CI->uri->segment(1);
        $data=array('url' => $url);        
        $CI->session->set_userdata($data); 
        return $CI->objMenu->listaMenuOpciones();
    }

    /*public function userDataGet(){
        $CI =& get_instance();
        $CI->load->model('usuario_model','ObjUsuario');
        return $ObjUsuario->get_ObjUsuario( $this->session->userdata('IdUsuario') );
    }*/

    //VERIFICAR ACCESO DE USUARIO
    public function verificaAcceso() {
        $CI = & get_instance();
        $iduser = $CI->session->userdata('IdUsuario');
        //echo $iduser." dddd";
        //echo $CI->uri->segment(1);exit;
        if($iduser){
            $url = $CI->uri->segment(1);
            $query = $CI->db->query("
                SELECT per.*, men.* 
                FROM permisorol per 
                INNER JOIN usuario usu ON usu.nIdRol = per.nIdRol
                INNER JOIN menu men ON men.nMenId = per.nMenId 
                WHERE men.cMenUrl= ? AND usu.nUsuCodigo=? ", 
                    array($url,$iduser));

            if ($query->num_rows() > 0) {
                return true;
            }
            show_error(utf8_decode('<center><div style="display: table-cell;vertical-align: middle;position: relative;"><center><br/><p><img src="'.URL_IMG.'error.gif"/><h2 style="color:black;">No se cuenta con los privilegios suficientes para acceder a esta página.</h2></p></center></div></center>'), 500);
        }
        else{
            redirect('/');
        }
    }
    

}
?>