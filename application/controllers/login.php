<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /*$this->load->model('usuario_model', 'objUsuario');
        $this->load->model('persona_model', 'ObjPersona');
        $this->load->model('menu_model', 'ObjMenu');
        $this->load->model('permiso_model', 'ObjPermiso');
        $this->load->model('modulo_model', 'ObjModulo');
        $this->load->model('empresa_model', 'ObjEmpresa');*/
    }
    
    
    public function acceso() {
        $this->load->view('login/login_view');
    }

   

    

    public function logout() {
        $this->session->sess_destroy();
        redirect("/");
    }

   
}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */
?>