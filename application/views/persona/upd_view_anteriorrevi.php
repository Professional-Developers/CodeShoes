<script type="text/javascript" src="<?php echo URL_JS ?>persona/jsPersonaUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal" todoMayuscula action="#" id="frmPersonaUpd" name="frmPersonaUpd">
        <input type="hidden" name="hdnidPersona_upd" id="hdnidPersona_upd" value="<?php echo $informacion[0]['nPerId']; ?>"/>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombres</label>
            <div class="col-lg-5">
                <input type="text" id="txtcPerNombresUpd" name="txtcPerNombresUpd" placeholder="Ejm: Juan Valera" class="form-control uniform-input text" placeholder="Ejm: Juan Valera" value="<?php echo $informacion[0]['cPerNombres']; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Apellido Paterno</label>
            <div class="col-lg-5">
                <input type="text" id="txtcPerApellidoPaternoUpd" name="txtcPerApellidoPaternoUpd" placeholder="Ejm: Perez" class="form-control uniform-input text" id="txtcPerApellidoPaternoUpd" name="txtcPerApellidoPaternoUpd" placeholder="Ejm: Perez" value="<?php echo $informacion[0]['cPerApellidoPaterno']; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Apellido Materno</label>
            <div class="col-lg-5">
                <input type="text" id="txtcPerApellidoMaternoUpd" name="txtcPerApellidoMaternoUpd" placeholder="Ejm: Flores" class="form-control uniform-input text" value="<?php echo $informacion[0]['cPerApellidoMaterno']; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Dni</label>
            <div class="col-lg-4">
                <input type="text" id="txtcPerDniUpd" name="txtcPerDniUpd"  minlength="8" maxlength="8" placeholder="Ejm: 45594215" class="form-control uniform-input text" value="<?php echo $informacion[0]['cPerDni']; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Dirección</label>
            <div class="col-lg-5">
                <input type="text" id="txtcPerDireccionUpd" name="txtcPerDireccionUpd" placeholder="Ejm: Los sables 532 urb La Arboleda" class="form-control uniform-input text" value="<?php echo $informacion[0]['cPerDireccion']; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Teléfono</label>
            <div class="col-lg-4">
                <input type="text" id="txtcPerTelefonoUpd" name="txtcPerTelefonoUpd" placeholder="Ejm: 044252827" class="form-control uniform-input text" value="<?php echo $informacion[0]['cPerTelefono']; ?>" />
                <span class="help-block blue">(044) 241578</span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Celular</label>
            <div class="col-lg-4">
                <input maxlength="15" type="text" id="txtcPerCelularUpd" name="txtcPerCelularUpd" placeholder="Ejm: 948356557" class="form-control uniform-input text" value="<?php echo $informacion[0]['cPerCelular']; ?>" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Stand</label>
            <div class="col-lg-5">
                <?php //print_r($sucursal);?>
                <select id="upd_cbo_nSurId" name="upd_cbo_nSurId" class="form-control">
                    <?php foreach($sucursal as $suc){
                        if($suc['nSurId']==$informacion[0]['nSurId']){
                            echo "<option selected value=".$suc['nSurId'].">".$suc['cSurNombre']."</option>";
                        }else{
                            echo "<option value=".$suc['nSurId'].">".$suc['cSurNombre']."</option>";
                        }
                    }
?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnActualizar" class="btn btn-info">Actualizar</button>
                <button type="button" id="btnCancelarP" class="btn btn-default">cancelar</button>
                <div id="messageUpdPersona"></div>
            </div>
        </div>
    </form>
</div>
<div id="msjPersona">

</div>
