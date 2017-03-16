<script type="text/javascript" src="<?php echo URL_JS; ?>persona/jsPersonaQry.js" charset=UTF-8"></script>
<div id="qry_lista_personas">
    <input type="hidden" id="codPersona" name="" />
    <?php if ($informacion) {
        $contador=1;
        //print_r($informacion);exit;        
        ?>
        <table id="qry_persona" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dni</th>
                    <th>Direccion</th>
                    <th>Stand</th>
                    <th>Celular</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <!--<td><php echo $data["nPerId"]; ?></td>-->
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $data["cPerNombres"]; ?></td>
                        <td><?php echo $data["cPerApellidoPaterno"] . " " . $data["cPerApellidoMaterno"]; ?></td>
                        <td><?php echo $data["cPerDni"]; ?></td>
                        <td><?php echo $data["cPerDireccion"]; ?></td>
                        <td><?php echo ($data["sucursal"] == '') ? "-" : $data["sucursal"]; ?></td>
                        <td><?php echo ($data["cPerCelular"] == '') ? "-" : $data["cPerCelular"]; ?></td>
                        <td>
                            <a title="editar" class="optEditar iconic-icon-pen-alt2" onclick="panelUpdPersona('persona/panel_updPersona', '<?php echo htmlspecialchars(json_encode(array("nPerId" => $data['nPerId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                        <td>
                            <?php if ($data["cPerEstado"] == "1") { ?>
                                <!--<a class="iconic-icon-check-alt" title='Activo' onClick="confirmar('Persona','<center><span>Desea Activar el registro seleccionado?</span></center>','eliminarPersona(<php echo $data['nPerId']; ?>)')" style="cursor: pointer;">-->
                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelDelPersona(<?php echo htmlspecialchars($data['nPerId']); ?>)" style="cursor: pointer;">
                                    <!--<img title='Activo' src='<php echo URL_IMG; ?>iconok.png' width='20' height='20' onClick="confirmar('Persona','<center><span>Desea Activar el registro seleccionado?</span></center>','eliminarPersona(<php echo $data['nPerId']; ?>)')" style="cursor: pointer;" />-->
                                </a>
                            <?php } else { ?>
                                <a class="iconic-icon-x" title='Inactivo' onClick="panelDelPersona(<?php echo htmlspecialchars($data['nPerId']); ?>)" style="cursor: pointer;">
                                <!--<a class="iconic-icon-x" title='Inactivo' onClick="confirmar('Persona','<center><span>Desea Activar el registro seleccionado?</span></center>','eliminarPersona(<php echo $data['nPerId']; ?>)')" style="cursor: pointer;">-->
                                <!--<img title='Inactivo' src='<php echo URL_IMG; ?>iconquit.png' width='20' height='20' onClick="confirmar('Persona','<center><span>Desea Activar el registro seleccionado?</span></center>','eliminarPersona(<php echo $data['nPerId']; ?>)')" style="cursor: pointer;" />-->                                   
                                </a>
                            <?php  } ?>
                        </td>
                    </tr>
                <?php $contador++;} ?>
            </tbody>
        </table>
    <?php } else {
        echo "No se encuentran registros para personas";
    } ?>
</div>
<!--<div id="modalCambiaPersona" class="modal fade" tabindex="-1" style="display: none; " role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->



