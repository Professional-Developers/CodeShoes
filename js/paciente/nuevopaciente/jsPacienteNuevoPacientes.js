$(function() {
    ocultarControlesTabs();

/*    $("#listaPacientes").bind({
        click: function() {
            loadGridPacientesView();
        }
    });*/
});

/*function FnLoad()
{
    FnInicializarControles();
}*/
function mostrarControlesTabs() {
    $('.nav-tabs a[href="#' + "tab-2-informacionbasica" + '"]').show();
    $('.nav-tabs a[href="#' + "tab-3-telefonos" + '"]').show();
    $('.nav-tabs a[href="#' + "tab-4-correos" + '"]').show();
}
function ocultarControlesTabs() {
    $('.nav-tabs a[href="#' + "tab-2-informacionbasica" + '"]').hide();
    $('.nav-tabs a[href="#' + "tab-3-telefonos" + '"]').hide();
    $('.nav-tabs a[href="#' + "tab-4-correos" + '"]').hide();
}
/*
function loadGridPacientesView() {
    //alert("wfasf");
    $("#tab-1-qry-pacientes").html("");
    //msgLoading("#listaRoles", "");
    $.ajax({
        type: "POST",
        url: "qryPaciente",
        //url: "paciente/qryPaciente",
        cache: false,
        data: {
            tipo: 'QRY'
        },
        success: function(data) {
            //alert("hhuhuh")
            $("#tab-1-qry-pacientes").html(data);
        },
        error: function() {
            alert("error");
        }
    });
}

*/