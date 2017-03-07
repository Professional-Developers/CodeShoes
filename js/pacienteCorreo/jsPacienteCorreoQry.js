$(function(){
    //alert("hi");
    /*$('#permisosRolModal').on('hidden.bs.modal', function () {
        $(".optAsignar").show();
    })*/
      
    var tabla = $('#qry_lista_paciente_correos').DataTable({
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
    /*$(".optAsignar").bind({
        click:function(data){
            var id = $(this).data("pid");//Este es el id del rol
            var rol = $(this).data("rol");
            //alert(rol);
            console.log(id);
            //alert(id);
            getAsignarPermisos(id,rol);
        }
    });*/
    
});

function getUpdCorreo(id) {
    //alert("sdsdf" + id);
    $.ajax({
        //url: 'paciente/getPanelTelefonos',
        //url: 'getPanelTelefonosListado',
        url:'getUpdCorreo',
        cache: false,
        type: 'POST',
        data: {
            nCodigoRedSocial: id
        },
        success: function (data) {
             console.log(data);
            var obj = JSON.parse(data);
            console.log(obj);
            $("#hdn_codigocorreo").val(obj.nCodigoRedSocial)
            $("#ddlTipoRedSocial option:selected").val(obj.nTipoRedSocial)
            $("#txtDirecciónRedSocial").val(obj.vDireccion)
            $("#txtTitularRedSocial").val(obj.vTitular)
            if(obj.bPrincipal=="1"){
                $("#chkEsPrincipal").prop("checked", true)
            }else{
                $("#chkEsPrincipal").prop("checked", false)
            }
            /*$("#hdn_codigotelefono").val(obj.nCodigoTelefono)*/
            
        },
        error: function (er) {
            console.log("error".er);
        }
    });
}