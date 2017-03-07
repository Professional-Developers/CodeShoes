$('#data_1 .input-group.date').datepicker({
    todayBtn: "linked",
    keyboardNavigation: true,
    forceParse: false,
    calendarWeeks: true,
    autoclose: true,
    format: "dd/mm/yyyy"
});

$(function() {
    /*Inicializando valores*/
    var dateNow = new Date();
    var yyyy = dateNow.getFullYear().toString();
    var mm = (dateNow.getMonth() + 1).toString();
    var dd = dateNow.getDate().toString();

    document.getElementById("txtFechaNacimiento").value = (dd[1] ? dd : "0" + dd[0]) + '/' + (mm[1] ? mm : "0" + mm[0]) + '/' + yyyy;

    var Cargo = false;
    FnLoad();

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

function loadGridPacientesView() {
    $("#tab-qry-pacientes").html("");
    //msgLoading("#listaRoles", "");
    $.ajax({
        type: "POST",
        //url: "paciente/qryPaciente",
        url: "qryPaciente",
        cache: false,
        data: {
            tipo: 'QRY'
        },
        success: function(data) {
            //alert("hhuhuh")
            $("#tab-qry-pacientes").html(data);
        },
        error: function() {
            alert("error");
        }
    });
}


function FnInicializarControles()
{
    //alert(URL_MAIN);
    //Cargar Estado Civil:
    //*********************************************************************************************************
    /*$.ajax({
     //url: "../../App_Code/Controller/GenericaController.php?tipo=c&tipoDescripcion=EstadoCivil",
     url: URL_MAIN+"",
     datatype: "json",
     success: function (data, textStatus, jqXHR)
     {
     if (textStatus == 'success')
     {
     var obj = jQuery.parseJSON(data);
     
     $.each(obj, function (i, value)
     {
     //console.log(value);
     $('#ddlEstadoCivil').append($('<option>').text(value.text).attr('value', value.id));
     });
     
     }
     }
     });*/
    //*********************************************************************************************************
    //Cargar Estados Registro:
    //*********************************************************************************************************
    /*$.ajax({
     url: "../../App_Code/Controller/GenericaController.php?tipo=c&tipoDescripcion=EstadoRegistro",
     datatype: "json",
     success: function (data, textStatus, jqXHR)
     {
     if (textStatus == 'success')
     {
     var obj = jQuery.parseJSON(data);
     
     $.each(obj, function (i, value)
     {
     $('#ddlEstado').append($('<option>').text(value.text).attr('value', value.id));
     });
     }
     }
     });*/
    //*********************************************************************************************************
    //*********************************************************************************************************
    //Cargar Local Registro:
    //*********************************************************************************************************

    /*$.ajax({
     url: "../../App_Code/Controller/LocalController.php?tipo=c",
     datatype: "json",
     success: function (data, textStatus, jqXHR)
     {
     if (textStatus == 'success')
     {
     var obj = jQuery.parseJSON(data);
     
     $.each(obj, function (i, value)
     {
     
     $('#ddlLocalRegistro').append($('<option>').text(value.vDescripciónLocal).attr('value', value.nCodigoLocal));
     $('#ddlLocalAtencion').append($('<option>').text(value.vDescripciónLocal).attr('value', value.nCodigoLocal));
     });
     }
     }
     });*/

    //*********************************************************************************************************
    //*********************************************************************************************************
    //Cargar Operador Telefonico:
    //*********************************************************************************************************
    /*$.ajax({
     url: "../../App_Code/Controller/GenericaController.php?tipo=c&tipoDescripcion=OperadorTelefonico",
     datatype: "json",
     success: function (data, textStatus, jqXHR)
     {
     if (textStatus == 'success')
     {
     var obj = jQuery.parseJSON(data);
     
     $.each(obj, function (i, value)
     {
     $('#ddlOperador').append($('<option>').text(value.text).attr('value', value.id));
     });
     }
     }
     });*/
    //*********************************************************************************************************
    //$('#imagePreviewUser').removeAttr("src").attr('src', "");

    //$('#imagePreviewUser').attr('src', '../../Inspinia/img/user_new.jpg?1.0.0');
    var nCodigoPaciente = 0;
    var nTipo = 0;
    if (nCodigoPaciente != '0')
    {
        FnCargarControles();
    } else
    {
        var fecha = new Date();
        var mes = (fecha.getMonth() + 1).toString();
        var anio = fecha.getFullYear();
        var vCodigoPaciente = anio + '0' + mes;
        //alert(vCodigoPaciente);
        $("#txtHCL").val(vCodigoPaciente);
        //document.getElementById("txtHCL").value = anio + mes;
    }
}
//no entiendo


/*
 jQuery("#file").change(function () {
 
 var file = this.files[0];
 var imagefile = file.type;
 
 var match = ["image/jpeg", "image/png", "image/jpg"];
 if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
 {
 $('#imagePreviewUser').attr('src', '../../Inspinia/img/user_new.jpg');
 
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
 }*/

function FnInsetarPaciente() {
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

    var nCodigoPaciente = 0;

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
        msgLoadSave("#message", "#btnGrabar");
        $.ajax({
            type: 'POST',
            //url: '../../App_Code/Controller/PacienteController.php?tipo=c',
            //url: URL_MAIN + "paciente/pacienteIns",
            url: "pacienteIns",
            data:
                    {
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
                        //p_iFoto: rutaFoto,
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
                var codigo, correlativo;
                //codigo = resp.split("|")[0];
                //correlativo = resp.split("|")[1];
                //nCodigoPaciente = codigo;
                nCodigoPaciente = resp;
                //InsertarDetallePaciente(codigo);
                console.log(nCodigoPaciente);

                if (typeof file_data === 'undefined')
                {
                    var file_data = $("#file").prop("files")[0];   // Getting the properties of file from file field
                    var form_data = new FormData();                  // Creating object of FormData class
                    form_data.append("file", file_data);              // Appending parameter named file with properties of file_field to form_data
                    form_data.append("user_id", 123);                 // Adding extra parameters to form_data
                    //alert('hi')
                    $.ajax({
                        //url: "upload.php?nombreImagen=" + correlativo,
                        //url: "paciente/upload",
                        url: "upload",
                        dataType: 'script',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post'
                    });
                }
                msgLoadSaveRemove("#btnGrabar");
                if (nCodigoPaciente >= 1) {
                    mostrarControlesTabs();
                    mensajeExito("Codigo generado: " + nCodigoPaciente);
                    //getDatosInformacionBasica(nCodigoPaciente);
                    $('.nav-tabs a[href="#' + "tab-2-informacionbasica" + '"]').tab('show');//para seleccionar un tab
                    $("#hdn_codigopaciente").val(nCodigoPaciente);
                    getDatosTelefonos(nCodigoPaciente);
                    getDatosCorreos(nCodigoPaciente);
                } else {
                    console.log("Error Registro Usuario");
                }
            }
        });
    }
    //alert(estadoCivil);

    //alert(esMoroso);
    //alert(fechaNacimiento);
    //alert(localRegistro);
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