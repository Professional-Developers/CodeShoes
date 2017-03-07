//$.extend( $.fn.dataTable.defaults, {
//    responsive: true
//} );
$(function () {
    $('#modalCambiaPass').on('hidden.bs.modal', function () {
        $(".optEditar").show();
    })

    $('#permisosModal').on('hidden.bs.modal', function () {
        $(".optAsignar").show();
    })
    
    var tabla = $('#qry_lista_personas_usuarios').DataTable({
        "iDisplayLength": 7,
        "lengthMenu": [7, 25, 50, 75, 100],
        "bDestroy": true,
        "bFilter": true,
        "bSort": true,
        "responsive": true,
        //"bLengthChange":false,
        "oLanguage": {
            "sEmptyTable": "Tabla sin data disponible",
            "bSort": false,
            "sInfo": "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando desde 0 hasta 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sLoadingRecords": "Cargando...",
            "sProcessing": "Procesando...",
            "sSearch": "Buscar:",
            "sZeroRecords": "No se encontraron resultados",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Sig.",
                "sPrevious": "Ant."
            },
            "oAria": {
                "sSortAscending": ": activar para Ordenar Ascendentemente",
                "sSortDescending": ": activar para Ordendar Descendentemente"
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            },
        ],
    });
    $(".optAsignar").bind({
        click: function (data) {
            //$(".optAsignar").hide();
            //$("#permisosModal").modal("show");
            var id = $(this).data("pid");
            console.log(id);
            //alert(id);
            getAsignarPermisos(id);
        }
    });
    

    $(".optEditar").bind({
        click: function () {
            $(".optEditar").hide();
            var pk    = $(this).data('pk');
            var clave = $(this).data('clave');
            var idrol = $(this).data('idrol');
            var rol   = $(this).data('rol');
            $("#codUsuario").val(pk);
            $("#txtClaveUpd").val(clave);
            $("#cboTipoRolUpd").val(idrol);
            $("#modalCambiaPass").modal("show");
            msgLoadSaveRemove("#btnchange");
        }
    });

    //optAsignar
    
});
