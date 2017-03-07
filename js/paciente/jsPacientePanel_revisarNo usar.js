$(function(){
    //alert("hi");
    $('#permisosRolModal').on('hidden.bs.modal', function () {
        $(".optAsignar").show();
    })
      
  
    $(".optTelefonos").bind({
        click:function(data){
            var id = $(this).data("pid");//Este es el id del rol
            console.log(id);
            //getAsignarPermisos(id);
            getPanelTelefonos(id)
        }
    });
    $(".optCorreos").bind({
        click:function(data){
            var id = $(this).data("pid");//Este es el id del rol
            console.log(id);
            //getAsignarPermisos(id);
            getPanelCorreos(id)
        }
    });
    
});
function getPanelTelefonos(pid) {
    //console.log(pid);
    $.ajax({
        //url: 'paciente/getPanelTelefonos',
        url: 'getPanelTelefonos',
        cache: false,
        type: 'POST',
        data: {
            pid: pid
        },
        success: function (data) {
            //$(".modal-body").html(data);
            $("#bodyTelefonos").html(data);
            $('#modalTelefonos').modal({
                show: true
            });
//            $('.modalAmpliado').css('width', '60%');
            // $("#listaPermisos").html(data);
        },
        error: function (er) {
            console.log("error".er);
        }
    });
}
function getPanelCorreos(pid) {
    //console.log(pid);
    $.ajax({
        //url: 'paciente/getPanelCorreos',
        url: 'getPanelCorreos',
        cache: false,
        type: 'POST',
        data: {
            pid: pid
        },
        success: function (data) {
            //$(".modal-body").html(data);
            $("#bodyCorreos").html(data);
            $('#modalCorreos').modal({
                show: true
            });
//            $('.modalAmpliado').css('width', '60%');
            // $("#listaPermisos").html(data);
        },
        error: function (er) {
            console.log("error".er);
        }
    });
}
//function loadGridRolesView() {
//    $("#listaRoles").html("");
//    //msgLoading("#listaRoles", "");
//    $.ajax({
//        type: "POST",
//        //url: "usuario/qryPersonaUsu",
//        url: "rol/qryRolUsu",
//        cache: false,
//        data: {
//            tipo: 'CBO'
//        },
//        success: function (data) {
//            //alert("hhuhuh")
//            $("#listaRoles").html(data);
//        },
//        error: function () {
//            alert("error");
//        }
//    });
//}