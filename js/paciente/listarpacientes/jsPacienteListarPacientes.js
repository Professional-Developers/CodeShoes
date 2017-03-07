$('#data_1 .input-group.date').datepicker({
    todayBtn: "linked",
    keyboardNavigation: true,
    forceParse: false,
    calendarWeeks: true,
    autoclose: true,
    format: "dd/mm/yyyy"
});

$(function() {
    ocultarControlesTabs();
    /*$("#ul-menu-list li").click(function () {
     $('.mistabs').hide().eq($(this).index()).show();  // hide all divs and show the current div
     });*/
//     $('.nav-tabs a[href="#' + "tab-1-qry-pacientes" + '"]').tab('show');
//     $('.nav-tabs a[href="#' + "tab-2-informacionbasica" + '"]').tab('show');
    //$('#tab-2-informacionbasica').css("display","block");
    //$('#tab-3-telefonos').css("display","block");
//    $('#tab-2-informacionbasica').show();
//    $('#tab-3-telefonos').show();
//    $('#li2-informacionbasica').show();
//    $('#li3-telefonos').show();

//    $(".mistabs").removeClass('active');
//    $(".mistabs").eq(0).addClass('active');//Listar 
    loadGridPacientesView();
    var dateNow = new Date();
    var yyyy = dateNow.getFullYear().toString();
    var mm = (dateNow.getMonth() + 1).toString();
    var dd = dateNow.getDate().toString();

    document.getElementById("txtFechaNacimiento").value = (dd[1] ? dd : "0" + dd[0]) + '/' + (mm[1] ? mm : "0" + mm[0]) + '/' + yyyy;
    /*
     var Cargo = false;
     FnLoad();*/

    $("#listaPacientes").bind({
        click: function() {
            loadGridPacientesView();
        }
    });
});

function FnLoad()
{
    FnInicializarControles();
}
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

