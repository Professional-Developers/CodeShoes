$(function() {
    //alert("hi");
    $(".optEditar").bind({
        click: function(data) {
            var id = $(this).data("pid");//Este es el id del rol
            mostrarControlesTabs();
            $('.nav-tabs a[href="#' + "tab-2-informacionbasica" + '"]').tab('show');//para seleccionar un tab
            $("#hdn_codigopaciente").val(id);
            getDatosInformacionBasica(id);
            getDatosTelefonos(id);
            getDatosCorreos(id);
        }
    });

    var tabla = $('#qry_lista_pacientes').DataTable({
        "iDisplayLength": 12,
        "lengthMenu": [12, 25, 50, 75, 100],
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


});
function getDatosInformacionBasica(pid) {
    //$("#tab-2-telefonos").html("holass");

    $("#hdn_codigotelefono").val(0)
    $.ajax({
        //url: 'paciente/getPanelTelefonos',
        url: 'getDatosInformacionBasica',
        cache: false,
        type: 'POST',
        data: {
            pid: pid
        },
        success: function(data) {
            console.log(data);
            var obj = JSON.parse(data);
            console.log(obj);
            //alert(obj.vCodigoPaciente)
            $("#hdn_codigopaciente").val(pid)
            $("#txtHCL").val(obj.vCodigoPaciente)
            $("#txtNombrePaciente").val(obj.vNombre)
            $("#txtApellidoPaterno").val(obj.vApellidosPaterno)
            $("#txtApellidoMaterno").val(obj.vApellidosMaterno)
            $("#txtDNI").val(obj.vDNI)
            $("#txtOcupacion").val(obj.vOcupacion)
            //$("#txtFechaNacimiento").val(data["vOcupacion"])
            $("#txtCentroTrabajo").val(obj.vLugarTrabajo)
            //Genero
            if (obj.cGenero == "1") {
                $("#rdbMasculino").prop("checked", true)
            } else {
                $("#rdbFemenino").prop("checked", true)
            }
            //Morosidad
            if (obj.cEsMoroso == "1") {
                $("#chkEsMoroso").prop("checked", true)
            } else {
                $("#chkEsMoroso").prop("checked", false)
            }
            //estadocivil
            $("#ddlEstadoCivil option[value='" + obj.nEstadoCivil + "']").attr('selected', 'selected');
            $("#ddlEstado option[value='" + obj.nEstado + "']").attr('selected', 'selected');
            $("#txtProcedencia").val(obj.vProcedencia)
            $("#txtObservaciones").val(obj.vObservaciones)
            $("#txtDireccion").val(obj.vDireccion)
            if (obj.iFoto == '') {
                $('#imagePreviewUser').attr('src', URL_MAIN + "plugins/Inspinia/img/user_new.jpg");
                
            } else {
                $('#imagePreviewUser').attr('src', "../uploads/" + obj.iFoto);
            }
        },
        error: function(er) {
            console.log("error".er);
        }
    });
}
function getDatosTelefonos(pid) {
    //console.log(pid);
    // $("#tab-2-telefonos").html("holass");   
    $("#listaPacienteTelefonos").html("Cargando...");
    $.ajax({
        //url: 'paciente/getPanelTelefonos',
        url: 'getPanelTelefonosListado',
        cache: false,
        type: 'POST',
        data: {
            pid: pid
        },
        success: function(data) {
            console.log(data);
            $("#listaPacienteTelefonos").html(data);
        },
        error: function(er) {
            console.log("error".er);
        }
    });
}
function getDatosCorreos(pid) {
    //console.log(pid);
    // $("#tab-2-telefonos").html("holass");   
    $("#listaPacienteCorreos").html("Cargando...");
    $.ajax({
        //url: 'paciente/getPanelTelefonos',
        url: 'getPanelCorreosListado',
        cache: false,
        type: 'POST',
        data: {
            pid: pid
        },
        success: function(data) {
            console.log(data);
            $("#listaPacienteCorreos").html(data);
        },
        error: function(er) {
            console.log("error".er);
        }
    });
}

/*
 function getPanelCorreos(pid) {
 //console.log(pid);
 $.ajax({
 url: 'paciente/getPanelCorreos',
 //url: 'usuario/getPermisos',
 cache: false,
 type: 'POST',
 data: {
 pid: pid
 },
 success: function(data) {
 //$(".modal-body").html(data);
 $("#bodyCorreos").html(data);
 $('#modalCorreos').modal({
 show: true
 });
 //            $('.modalAmpliado').css('width', '60%');
 // $("#listaPermisos").html(data);
 },
 error: function(er) {
 console.log("error".er);
 }
 });
 }*/
function FnUpdPaciente() {

    //borrando codigotelefono
    var localRegistro = $("#ddlLocalRegistro").val();
    var localAtencion = $("#ddlLocalAtencion").val();
    var nombrePaciente = $("#txtNombrePaciente").val();
    var apellidoPaterno = $("#txtApellidoPaterno").val();
    var apellidoMaterno = $("#txtApellidoMaterno").val();
    var fechaNacimiento = $("#txtFechaNacimiento").val();
    fechaNacimiento = formattedDate(fechaNacimiento, '1');
    var direccion = $("#txtDireccion").val();
    var observaciones = $("#txtObservaciones").val();
    var genero = "";
    if ($("#rdbMasculino").is(':checked')) {
        genero = "1"
    }
    if ($("#rdbFemenino").is(':checked')) {
        genero = "0"
    }
    var medioContactoFavorito = "Prueba";
    var esMoroso = "";
    if ($("#chkEsMoroso").is(':checked')) {
        esMoroso = "1"
    } else {
        esMoroso = "0"
    }
    var rutaFoto = "nueva";
    var numeroDNI = $("#txtDNI").val();
    var lugarTrabajo = $("#txtCentroTrabajo").val();
    var procedencia = $("#txtProcedencia").val();
    var estadoCivil = $("#ddlEstadoCivil option:selected").val();
    var ocupacion = $("#txtOcupacion").val();
    var usuarioCrea = "1";
    var HCL = $("#txtHCL").val();

    //var nCodigoPaciente = 0;
    var nCodigoPaciente = $("#hdn_codigopaciente").val();
    if (nombrePaciente == "" || apellidoPaterno == "")
    {
        alert("Es necesario completar los datos de paciente");
    } else
    {
        var file_data = $("#file").prop("files")[0];
        if (typeof file_data === 'undefined')
            file_data = "";
        else
            file_data = file_data.name;
        //alert(file_data)
        msgLoadSave("#message", "#btnGrabarUpd");

        $.ajax({
            type: 'POST',
            //url: '../../App_Code/Controller/PacienteController.php?tipo=c',
            //url:  "paciente/pacienteIns",
            url: "pacienteUpd",
            data:
                    {
                        p_nCodigoPaciente: nCodigoPaciente,
                        p_nCodigoLocalRegistro: localRegistro,
                        p_nCodigoLocalAtencion: localAtencion,
                        p_vNombre: nombrePaciente,
                        p_vApellidosPaterno: apellidoPaterno,
                        p_vApellidosMaterno: apellidoMaterno,
                        p_dFechaNacimiento: fechaNacimiento,
                        p_vDireccion: direccion,
                        p_vObservaciones: observaciones,
                        p_cGenero: genero,
                        p_vMedioContactoFavorito: medioContactoFavorito,
                        p_cEsMoroso: esMoroso,
                        p_iFoto: file_data,
                        p_vDNI: numeroDNI,
                        p_vLugarTrabajo: lugarTrabajo,
                        p_vProcedencia: procedencia,
                        p_nEstadoCivil: estadoCivil,
                        p_vOcupacion: ocupacion,
                        p_nUsuarioCrea: usuarioCrea,
                        p_vHCL: HCL,
                        p_nombreImage: file_data
                    },
            success: function(resp)
            {
                //Imprimir mensaje conformidad

                if (typeof file_data === 'undefined')
                {
                    var file_data = $("#file").prop("files")[0];   // Getting the properties of file from file field
                    var form_data = new FormData();                  // Creating object of FormData class
                    form_data.append("file", file_data);              // Appending parameter named file with properties of file_field to form_data
                    form_data.append("user_id", 123);                 // Adding extra parameters to form_data
                    //alert('hi')
                    $.ajax({
                        //url: "upload.php?nombreImagen=" + correlativo,
                        url: "paciente/upload",
                        url: "upload",
                                dataType: 'script',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post'
                    });
                }

                msgLoadSaveRemove("#btnGrabarUpd");
                mensajeExito("Modificado satisfactoriamente");
            }
        });
    }

}


$("#file").change(function() {
//    alert(URL_MAIN+"plugins/Inspinia/img/user_new.jpg");
    var file = this.files[0];
    var imagefile = file.type;
    var match = ["image/jpeg", "image/png", "image/jpg"];
    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
    {
        //$('#imagePreviewUser').attr('src', '../../Inspinia/img/user_new.jpg');
        $('#imagePreviewUser').attr('src', URL_MAIN + "plugins/Inspinia/img/user_new.jpg");
    } else
    {
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
    }
});
function imageIsLoaded(e)
{
    $('#imagePreviewUser').attr('src', "");
    $('#imagePreviewUser').attr('src', e.target.result);
    $('#imagePreviewUser').attr('width', '120px');
    $('#imagePreviewUser').attr('height', '120px');
}