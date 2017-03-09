<script type="text/javascript" src="<?php echo URL_JS; ?>rol/jsRolQry.js"></script>
<br/>
<table id="qry_lista_roles_usuarios"  cellspacing="0" class="display" width="60%">
    <thead>
        <tr>
            <th></th>
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
                <td><?php echo $fila["cNombre"]; ?></td>
                <td>
                    <a id="btnoptAsignar"  title="Asignar Permisos" class="optAsignar btn btn-sm btn-primary" data-rol="<?php echo $fila["cNombre"]; ?>" data-pid="<?php echo $fila['nIdRol'] ?>" title="Establecer Permisos"><i class="fa fa-exclamation-triangle"></i> Permisos
                    </a>
                </td>
            </tr>
            <?php $contador++;
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>