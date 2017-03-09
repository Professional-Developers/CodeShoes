<script type="text/javascript" src="<?php echo URL_JS ?>usuario/jsUsuarioIns.js" ></script>
<!--<div class="box">
    <div class="content">-->
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmUsuarioIns" name="frmPersonaIns" role="form">
        <div class="form-group">
            <!--<div class="span12">-->
            <label class="control-label col-lg-3" for="normalInput" >Buscar Persona </label>
            <div class="col-lg-3">
                <input class="form-control uniform-input text" type="text" maxlength="8" id="txtcPerDni" name="txtcPerDni" placeholder="Dni: 46087731" />
                <input type="hidden" id="txt_nPerId" name="txt_nPerId">
                <button id="btn_fndPerson" class="btn-primary btn">Buscar</button>
                <div id="infopersona"></div>
            </div>
            <!--</div>-->

        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput" >Usuario </label>
            <div class="col-lg-3">
                <input class="form-control uniform-input text" type="text" id="txtUsuario" name="txtUsuario" placeholder="Ejm: usu123" disabled="" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput" >Clave </label>
            <div class="col-lg-3">
                <input class="form-control uniform-input text" type="password" id="txtClave" maxlength="15" name="txtClave" placeholder="Ejm: 123" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput" >Rol </label>
            <div class="col-lg-3">
                <!--<select class="form-control" name="cboTipoUser" id="cboTipoUser">-->
                    <select class="form-control" name="cboTipoRol" id="cboTipoRol">
                    <?php
                    foreach ($cbo as $key => $value) {
                        ?>
<!--                        <option value="<php echo $value['codx']; ?>"><php echo $value['dato']; ?></option>-->
                    <option value="<?php echo $value['nIdRol']; ?>"><?php echo $value['cNombre']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>	
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarUsuario" class="btn btn-info">Registrar</button>
                <button type="button" id="btnCancelar" class="btn btn-default">Cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <!--</div>-->
    <div id="msjPersona"></div>
    <!--</div>-->
</div>