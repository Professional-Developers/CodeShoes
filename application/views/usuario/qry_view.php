<!-- ssfjnsdfksndfkj 
file:///C:/Users/cricri7/Downloads/inspinia_admin-v2.5/inspinia_admin-v2.5/icons.html

-->
<script type="text/javascript" src="<?php echo URL_JS; ?>usuario/jsUsuarioQry.js"></script>
    <!--<table id="qry_lista_personas_usuarios" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">-->
<br/>
<!--<table id="qry_lista_personas_usuarios" cellpadding="0" cellspacing="0" border="0" class="display nowrap" width="100%">-->
<table id="qry_lista_personas_usuarios"  cellspacing="0" class="display" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dni/Usuario</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $contador = 1;
        foreach ($listado as $fila) {
            ?>
            <tr class='todoMayuscula'>           
                <!--<td><php echo $fila["nUsuCodigo"]; ?></td>-->
                <td><?php echo $contador; ?></td>
                <td><?php echo $fila["cPerNombres"]; ?></td>
                <td><?php echo $fila["cPerApellidoPaterno"] . ' ' . $fila["cPerApellidoMaterno"]; ?></td>
                <td><?php echo $fila["cPerDni"]; ?></td>
                <td><?php echo $fila["rol"]; ?></td>
                <td>
<!--                    <a onclick="edit_person('1')" title="Edit" href="javascript:void()" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>-->
                    <a data-pk="<?php echo $fila["nUsuCodigo"]; ?>" data-clave="<?php echo $fila["cUsuClave"]; ?>" data-idrol="<?php echo $fila["nIdRol"]; ?>" data-rol="<?php echo $fila["rol"]; ?>" class="optEditar btn btn-sm btn-info" style="cursor: pointer;" data-pid="<?php echo $fila['nUsuCodigo'] ?>" title="Cambiar Clave"><i class="glyphicon glyphicon-pencil"></i> Editar Usuario
                    </a>
                    &nbsp;
<!--                    <a id="btnoptAsignar"  title="Asignar Permisos" class="optAsignar btn btn-sm btn-primary" data-pid="<php echo $fila['nUsuCodigo'] ?>" title="Establecer Permisos"><i class="fa fa-exclamation-triangle"></i> Permisos
                    </a>-->
                </td>
            </tr>
            <?php $contador++;
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dni/Usuario</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>