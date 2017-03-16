<script type="text/javascript" src="<?php echo URL_JS; ?>usuario/jsUsuario.js"></script>

<style type="text/css">
    #permisosRolModal {
        top:15%;
        /*right:30%;*/
        outline: none;
        left:40%;
    }
    #permisosRolModal .modal-dialog  {width:50% !important;color:black;}
</style>
<!--<div class="row-fluid">
    <div class="span12">-->
<div class="col-lg-12">
    <div class="page-header">
        <h4>Registro y Asignación de Usuarios</h4>
    </div>
    <div style="margin-bottom: 20px;">
        <ul id="ListasUsers" class="nav nav-tabs pattern">
            <li class="active"><a href="#home" data-toggle="tab">Nuevo Usuario</a></li>
            <li><a href="#listaPersonasUsuarios" data-toggle="tab" id="listaPerUsers" >Listar Usuarios</a></li>
            <li><a href="#listaRoles" data-toggle="tab" id="listaRol" >Listar Roles</a></li>
            <!--<li><a href="#listaPersonasUsuarios" data-toggle="tab" id="listaPerUsers" >Listar Usuarios</a></li>-->
        </ul>
        <div class="tab-content">
            <!--<div class="tab-pane fade in active" id="home">-->
            <div class="tab-pane fade in active" id="home">
                <?php $this->load->view("usuario/ins_view"); ?>
            </div>
            <div class="tab-pane fade" id="listaPersonasUsuarios">
            </div>
            <div class="tab-pane fade" id="listaRoles">
            </div>

        </div>
    </div>
</div>
<!--    </div> End .span6   
</div>-->
<!-- MODAL CAMBIAR CONTRASEÑA-->
<div  class="modal fade" id="modalCambiaPass"  tabindex="-1" role="dialog" aria-labelledby="lbldetalle" aria-hidden="true">
    <!--<div class="modal fade"  id="myModal"          tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headUsuUpd">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="lbldetalle">Cambiar Clave...</h3>
            </div>
            <!--<div class="modal-body" id="modalCambiaPass_body">-->
            <div class="modal-body" id="bodyUsuUpd">
                <form action="usuario/updateClave" type="post">
                    <div class="content">
                        <div class="form-row row-fluid">
                            <div class="span6">
                                <!--<div class="row-fluid">-->
                                    <input type="hidden" value="" id="codUsuario" name="codUsuario">
                                    <label class="form-label span3" for="txtClave" >Clave(Nueva) </label><br/>
                                    <input type="text" class="span5" id="txtClaveUpd" name="txtClaveUpd" ><br/><br/>
                                    <label class="form-label span3" for="txtClave" >Rol </label>
                                    <select class="form-control" name="cboTipoRolUpd" id="cboTipoRolUpd">
                                        <?php
                                        foreach ($cbo as $key => $value) {
                                            ?>
    <!--                        <option value="<php echo $value['codx']; ?>"><php echo $value['dato']; ?></option>-->
                                            <option value="<?php echo $value['nIdRol']; ?>"><?php echo $value['cNombre']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                    <!--                                    <input type="text" class="span5" id="txtRolUpd" name="txtRolUpd" >-->

                                <!--</div>-->
                            </div>
                            <div id="infopersona"></div>
                        </div>    
                    </div>    
                </form>
            </div>
            <div class="modal-footer" id="footerUsuUpd">
                <button id="btnchange" class="btn btn-primary">Cambiar Clave</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                <div id="msgUpdClave"></div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL NUEVO ASIGNAR PERMISOS A ROL-->
<div id="permisosRolModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="lbldetalle" aria-hidden="true">
    <div class="modal_dialog">
        <div class="modal-content modalAmpliado">
            <div class="modal-header" id="headPermisoUpd">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Permisos Rol</h3>
            </div>
            <div class="modal-body" id="bodyPermisoUpd">
            </div>
            <div class="modal-footer" id="footPermisoUpd">
                <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
                <button id="btnAsignar" class="btn btn-primary">Asignar Permisos</button>
                <!-- <a href="#" class="btn btn-primary"></a> -->
            </div>
        </div>
    </div>
</div>