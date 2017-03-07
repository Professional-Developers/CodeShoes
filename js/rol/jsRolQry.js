$(function(){
    //alert("hi");
    $('#permisosRolModal').on('hidden.bs.modal', function () {
        $(".optAsignar").show();
    })
      
    var tabla = $('#qry_lista_roles_usuarios').DataTable({
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
    //Ocultamos el Modal
   
    //Evento Asignar Permisos
    //$(".optAsignar").unbind();
    $(".optAsignar").bind({
        click:function(data){
            //$(".optAsignar").hide();
            //$("#permisosModal").modal("show");
            var id = $(this).data("pid");//Este es el id del rol
            var rol = $(this).data("rol");
            //alert(rol);
            console.log(id);
            //alert(id);
            getAsignarPermisos(id,rol);
        }
    });
    
});