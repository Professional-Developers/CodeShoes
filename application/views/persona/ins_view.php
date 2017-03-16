<script type="text/javascript" src="<?php echo URL_JS; ?>persona/jsPersonaIns.js"></script>
<!--<div class="box">
    <div class="content">-->
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmPersonaInsa" name="frmPersonaInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombres</label>
            <div class="col-lg-5">
                <input type="text" id="txtcPerNombres" name="txtcPerNombres" placeholder="Ejm: Juan Valera" class="form-control uniform-input text" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Apellido Paterno</label>
            <div class="col-lg-5">
                <input type="text" id="txtcPerApellidoPaterno" name="txtcPerApellidoPaterno" placeholder="Ejm: Perez" class="form-control uniform-input text" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Apellido Materno</label>
            <div class="col-lg-5">
                <input type="text" id="txtcPerApellidoMaterno" name="txtcPerApellidoMaterno" placeholder="Ejm: Flores" class="form-control uniform-input text" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Dni</label>
            <div class="col-lg-2">
                <input type="text" id="txtcPerDni" name="txtcPerDni"  minlength="8" maxlength="8" placeholder="Ejm: 45594215" class="form-control uniform-input text" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Dirección</label>
            <div class="col-lg-5">
                <input type="text" id="txtcPerDireccion" name="txtcPerDireccion" placeholder="Ejm: Los sables 532 urb La Arboleda" class="form-control uniform-input text" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Teléfono</label>
            <div class="col-lg-2">
                <input type="text" id="txtcPerTelefono" name="txtcPerTelefono" class="form-control mask uniform-input text" />
                <span class="help-block blue">(044) 241578</span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Celular</label>
            <div class="col-lg-2">
                <input maxlength="15" type="text" id="txtcPerCelular" name="txtcPerCelular" placeholder="Ejm: 948356557" class="form-control uniform-input text" />
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrar" class="btn btn-info">Registrar</button>
                <button type="button" id="btnCancelar" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <!--</div>-->
    <div id="msjPersona"></div>
    <!--</div>-->
</div>