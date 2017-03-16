<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_model extends CI_Model {

    //Atributos de Clase
    private $nMenId = '';
    private $nModId = '';
    private $cMenMenu = '';
    private $cMenUrl = '';
    private $cMenOrden = '';
    private $cMenActivo = '';

    //Constructor de Clase
    function __construct() {
        parent::__construct();
    }

    //FUNCIONES Set
    function set_nMenId($nMenId) {
        $this->nMenId = $nMenId;
    }

    function set_nModId($nModId) {
        $this->nModId = $nModId;
    }

    function set_cMenMenu($cMenMenu) {
        $this->cMenMenu = $cMenMenu;
    }

    function set_cMenUrl($cMenUrl) {
        $this->cMenUrl = $cMenUrl;
    }

    function set_cMenOrden($cMenOrden) {
        $this->cMenOrden = $cMenOrden;
    }

    function set_cMenActivo($cMenActivo) {
        $this->cMenActivo = $cMenActivo;
    }

    //FUNCIONES Get
    function get_nMenId() {
        return $this->nMenId;
    }

    function get_nModId() {
        return $this->nModId;
    }

    function get_cMenMenu() {
        return $this->cMenMenu;
    }

    function get_cMenUrl() {
        return $this->cMenUrl;
    }

    function get_cMenOrden() {
        return $this->cMenOrden;
    }

    function get_cMenActivo() {
        return $this->cMenActivo;
    }

    //Obtener Objeto MENU
    function get_ObjMenu($CAMPO) {
        $query = $this->db->query("SELECT * FROM MENU WHERE CAMPO=?", array($CAMPO));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //CREANDO EL OBJETO
        }
    }

    //LISTA DE MODULO + OPCIONES
    function listaMenuOpciones() {
        $resultado = array();
        $ul = "";
        $active = "";
        $opciones = "";
        $url = $this->session->userdata('url');
        $query = $this->db->query("SELECT * FROM modulo m where m.cModEstado='1' ORDER BY nModOrden");

        foreach ($query->result() as $row) {
            // print_r($row);exit();
            $opt = $this->listaSubMenus($row->nModId);
            if ($opt != null) {
                $active = "none";
                $ul = 'class="collapse"';
                $array = array();
                foreach ($opt->result() as $opcion) {
                    // var_dump($opcion);
                    if ($url) {
                        if ($opcion->cMenUrl == $url) {
                            $active = "block";
                        } else {
                            // $active = "";
                            // $opciones = '';
                        }
                    }
                    $array[] = array(
                        "value" => $opcion->cMenMenu,
                        "url" => $opcion->cMenUrl,
                        "sobrenombre" => $opcion->cMenSobreNombre
                    );
                }

                $resultado[] = array(
                    'menu' => $row->cModModulo,
                    'datos' => $array,
                    "icon" => $row->cModIcono,
                    'active' => $active,
                    'ul' => $ul);
            }
        }
        // print_p($resultado);exit();
        return $resultado;
    }

    //LISTA DE OPCIONES DEL MENU
    function listaSubMenus($IdModulo) {
        $IdUsuario = $this->session->userdata('IdUsuario');
        // echo "IDUSERR: ".$IdUsuario;exit();
        /*$query = $this->db->query("SELECT per.*, men.* FROM permiso per 
                        INNER JOIN usuario usu ON usu.nUsuCodigo = per.nUsuCodigo 
        		INNER JOIN menu men ON men.nMenId = per.nMenId
        		WHERE men.nModId=? AND usu.nUsuCodigo=? AND per.cPermActivo=1
        		ORDER BY men.cMenOrden", array($IdModulo, $IdUsuario));*/
        $query = $this->db->query("SELECT per.*, men.* FROM permisorol per 
                        INNER JOIN usuario usu ON usu.nIdRol = per.nIdRol 
        		INNER JOIN menu men ON men.nMenId = per.nMenId
                        INNER JOIN modulo m ON m.nModId = men.nModId 
        		WHERE men.nModId=? AND usu.nUsuCodigo=? AND per.cPermActivo=1 and m.cModEstado='1'
        		ORDER BY men.cMenOrden", array($IdModulo, $IdUsuario));
        if ($query->num_rows() > 0) {
            return $query;
        }
        return null;
    }

    public function getMenuxModulo($id) {
        $sql = "CALL USP_S_MENU('LXM'," . $id . ")";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            //return $query->result_array();
            $res = $query->result_array(); //sirve para mandar los datos
            $query->next_result();
            $query->free_result();
            return $res;
        } else {
            return false;
        }
    }

}

?>