$('#data_1 .input-group.date').datepicker({
    todayBtn: "linked",
    keyboardNavigation: true,
    forceParse: false,
    calendarWeeks: true,
    autoclose: true,
    format: "dd/mm/yyyy"
});

$(document).ready(function () {
    /*Inicializando valores*/
    var dateNow = new Date();
    var yyyy = dateNow.getFullYear().toString();
    var mm = (dateNow.getMonth() + 1).toString();
    var dd = dateNow.getDate().toString();

    document.getElementById("txtFechaNacimiento").value = (dd[1] ? dd : "0" + dd[0]) +'/' +(mm[1] ? mm : "0" + mm[0]) + '/' + yyyy;
    
    /*Incializando Grid Principal*/
    $("#GridViewPacientesContacto").jqGrid({
        url: "../../App_Code/Controller/PacienteController.php?tipo=rDetalleTelefono&p_nCodigoPaciente=" + nCodigoPaciente
        , datatype: "json"
        , mtype: "GET"
        , colNames: ["", "Codigo", "CodigoTelefono", "CodigoPaciente", "CodOperador",
            "Operador", "Cod Tipo Telefono", "Tipo Telefono", "Teléfono",
            "esWhatsApp", "WhatsApp", "Titular"]
        , colModel: [
            {name: 'act', index: 'act', width: 40, sortable: false},
            {name: "Codigo", sortable: false, width: 50, hidden: true},
            {name: "CodigoTelefono", sortable: false, width: 50, hidden: true},
            {name: "CodigoPaciente", sortable: false, width: 50, hidden: true},
            {name: "CodOperador", sortable: false, width: 50, hidden: true},
            {name: "Operador", sortable: false, width: 150},
            {name: "CodTipoTelefono", sortable: false, width: 50, hidden: true},
            {name: "TipoTelefono", sortable: false, width: 150},
            {name: "vTelefono", sortable: false, width: 150},
            {name: "esWhatsApp", sortable: false, width: 50, hidden: true},
            {name: "WhatsApp", sortable: false, width: 150},
            {name: "Titular", sortable: false, width: 150}
        ]
        , pager: "#PagerPacientesContacto"
        , rowNum: 10
        , rownumbers: true
        , rowList: [10, 20, 30]
        , height: '100%'
        , width: '100%'
        , loadonce: true
        , viewrecords: false
        , multiselect: false
        , gridComplete: function () {
            var ids = jQuery("#GridViewPacientesContacto").jqGrid('getDataIDs');
            for (var i = 0; i < ids.length; i++) {
                var cellValue = jQuery("#GridViewPacientesContacto").jqGrid('getCell', ids[i], 'Codigo');
                dlt = "<button type='button' class='btn btn-custom-primary' onclick=" + '"' + "FnDeleteDetail_Contacto('" + cellValue + "')" + '"' + "><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>";
                jQuery("#GridViewPacientesContacto").jqGrid('setRowData', ids[i], {act: dlt});
            }
        }
    });
    
    /*Incializando Grid Red Social*/
    
    $("#GridViewPacientesRedSocial").jqGrid({
        url: "../../App_Code/Controller/PacienteController.php?tipo=rDetalleSocial&p_nCodigoPaciente=" + nCodigoPaciente
        , datatype: "json"
        , mtype: "GET"
        , colNames: ["", "CodigoRedSocial", "CodigoPaciente", "CodTipo", "Tipo", "Dirección", "Titular", "CodPrincipal", "Principal"]
        , colModel: [
            {name: 'act', index: 'act', width: 40, sortable: false},
            {name: "nCodigoRedSocial", sortable: false, width: 50, hidden: true},
            {name: "nCodigoPaciente", sortable: false, width: 50, hidden: true},
            {name: "nTipoRedSocial", sortable: false, width: 50, hidden: true},
            {name: "vTipoRedSocial", sortable: false, width: 150},
            {name: "vDireccion", sortable: false, width: 150},
            {name: "vTitular", sortable: false, width: 150},
            {name: "bPrincipal", sortable: false, width: 80, hidden: true},
            {name: "vPrincipal", sortable: false, width: 150}
        ]
        , pager: "#PagerPacientesPacientesRedSocial"
        , rowNum: 10
        , rownumbers: true
        , rowList: [10, 20, 30]
        , height: '100%'
        , width: '100%'
        , loadonce: true
        , viewrecords: false
        , multiselect: false
        , gridComplete: function () {
            var ids = jQuery("#GridViewPacientesRedSocial").jqGrid('getDataIDs');
            for (var i = 0; i < ids.length; i++) {
                var cellValue = jQuery("#GridViewPacientesRedSocial").jqGrid('getCell', ids[i], 'nCodigoRedSocial');
                dlt = "<button type='button' class='btn btn-custom-primary' onclick=" + '"' + "FnDeleteDetail_RedSocial('" + cellValue + "')" + '"' + "><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>";
                jQuery("#GridViewPacientesRedSocial").jqGrid('setRowData', ids[i], {act: dlt});
            }
        }
    });
    
    /*Incializando Grid Cuentas*/
    var filas = 0;
    $("#GridViewPacientesCuentas").jqGrid({
        url: "../../App_Code/Controller/PacienteController.php?tipo=rDetalleCuotasVencidas&p_nCodigoPaciente=" + nCodigoPaciente
        , datatype: "json"
        , mtype: "GET"
        , colNames: ["CodDetalle", "CodigoCronograma", "CodigoConcepto", "Concepto",
            "Fecha Vence", "Fecha Ultimo Abono", "Monto total", "Deuda", "nMoneda", "Moneda", "nEstado", "vEstado"]
        , colModel: [
            {name: "nCodigoCronogramaDetalle", sortable: false, width: 0, hidden: true},
            {name: "nCodigoCronograma", sortable: false, width: 0, hidden: true},
            {name: "nCodigoConcepto", sortable: false, width: 50, hidden: true},
            {name: "vConcepto", sortable: false, width: 200},
            {name: "vFechaProgramada", sortable: false, width: 150, hidden: false, editable: true},
            {name: "vFechaPago", sortable: false, width: 150, hidden: false, editable: true},
            {name: "nMontoTotal", sortable: false, width: 130, hidden: false, editable: true},
            {name: "nSaldo", sortable: false, width: 100, hidden: false, editable: true},
            {name: "nTipoMoneda", sortable: false, width: 100, hidden: true},
            {name: "vTipoMoneda", sortable: false, width: 100, hidden: false},
            {name: "nEstado", sortable: false, width: 100, hidden: true},
            {name: "vEstado", sortable: false, width: 100, hidden: false},
        ]
        , pager: "#PagerPacientesCuentas"
        , rowNum: 10
        , rownumbers: true
        , rowList: [10, 20, 30]
        , height: '200'
        , width: "100%"
        , loadonce: true
        , viewrecords: false
        , multiselect: false
        , gridComplete: function () {
            var ids = jQuery("#GridViewPacientesCuentas").jqGrid('getDataIDs');
            filas = ids.length;

            if (filas > 0)
            {
                document.getElementById("chkEsMoroso").checked = true;
            }


            for (var i = 0; i < ids.length; i++) {

                var cl = ids[i];
                var cellValue = jQuery("#GridViewPacientesCuentas").jqGrid('getCell', ids[i], 'nCodigoCronogramaDetalle');

            }
        }
    });
    jQuery("#GridViewPacientesCuentas").jqGrid('navGrid', "#prowed2", {edit: false, add: false, del: false});   
    
});


var Cargo = false;

FnLoad();

function FnLoad()
{
    FnLimpiarControles();
    FnInicializarControles();

}
;

function FnLimpiarControles()
{
    document.getElementById("ddlLocalRegistro").value = "";
    document.getElementById("ddlLocalAtencion").value = "";
    document.getElementById("txtNombrePaciente").value = "";
    document.getElementById("txtApellidoPaterno").value = "";
    document.getElementById("txtApellidoMaterno").value = "";
    document.getElementById("txtHCL").value = "";

    document.getElementById("txtFechaNacimiento").value = "";
    document.getElementById("txtDireccion").value = "";
    document.getElementById("txtObservaciones").value = "";

    document.getElementById("ddlEstadoCivil").value = "";

    document.getElementById("rdbMasculino").checked = false;
    document.getElementById("rdbFemenino").checked = false;

    //document.getElementById("").value = obj[0]['vMedioContactoFavorito'];
    //document.getElementById("chkEsMoroso").checked = false
    //
    //document.getElementById("").value = obj[0]['iFoto'];
    document.getElementById("txtDNI").value = "";
    //document.getElementById("").value = obj[0]['vLugarTrabajo'];
    //document.getElementById("").value = "";
    //document.getElementById("").value = obj[0]['cEstadoCivil'];
    //document.getElementById("").value = "";
    //document.getElementById("").value = obj[0]['cEstado'];

}
;

function FnInicializarControles()
{
    //Cargar Estado Civil:
    //*********************************************************************************************************
    $.ajax({
        url: "../../App_Code/Controller/GenericaController.php?tipo=c&tipoDescripcion=EstadoCivil",
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
    });
    //*********************************************************************************************************
    //Cargar Estados Registro:
    //*********************************************************************************************************
    $.ajax({
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
    });
    //*********************************************************************************************************
    //*********************************************************************************************************
    //Cargar Local Registro:
    //*********************************************************************************************************

    $.ajax({
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
    });
    
    //*********************************************************************************************************
    //*********************************************************************************************************
    //Cargar Operador Telefonico:
    //*********************************************************************************************************
    $.ajax({
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
    });
    //*********************************************************************************************************
    $('#imagePreviewUser').removeAttr("src").attr('src', "");
    
    $('#imagePreviewUser').attr('src', '../../Inspinia/img/user_new.jpg?1.0.0');

    if (nCodigoPaciente != '0')
    {
        FnCargarControles();
    }
    else
    {

        var fecha = new Date();
        var mes = (fecha.getMonth() + 1).toString();
        var anio = fecha.getFullYear();

        document.getElementById("txtHCL").value = anio + mes;
    }
}
;

function FnCargarControles()
{
    // document.getElementById("test").disabled = true;
    if (nTipo == "r")
    {
        var nodes = document.getElementById("bloqueo").getElementsByTagName('*');

        for (var i = 0; i < nodes.length; i++) {
            nodes[i].disabled = true;
        }

        nodes = document.getElementById("bloqueo2").getElementsByTagName('*');

        for (var i = 0; i < nodes.length; i++) {
            nodes[i].disabled = true;
        }

        nodes = document.getElementById("bloqueo3").getElementsByTagName('*');

        for (var i = 0; i < nodes.length; i++) {
            nodes[i].disabled = true;
        }

        var btnGrabar = document.getElementById("btnGrabar");
        btnGrabar.disabled = true;


    }
    ;
    $.ajax({
        url: "../../App_Code/Controller/PacienteController.php?tipo=f&codigoPaciente=" + nCodigoPaciente,
        datatype: "json",
        success: function (data, textStatus, jqXHR)
        {
            if (textStatus == 'success')
            {
                var obj = jQuery.parseJSON(data);
                document.getElementById("ddlLocalRegistro").value = obj[0]['nCodigoLocalRegistro'];
                document.getElementById("ddlLocalAtencion").value = obj[0]['nCodigoLocalAtencion'];
                document.getElementById("ddlEstadoCivil").value = obj[0]['nEstadoCivil'];
                document.getElementById("txtNombrePaciente").value = obj[0]['vNombre'];
                document.getElementById("txtApellidoPaterno").value = obj[0]['vApellidosPaterno'];
                document.getElementById("txtApellidoMaterno").value = obj[0]['vApellidosMaterno'];

                if (obj[0]['dFechaNacimiento'])
                {
                    document.getElementById("txtFechaNacimiento").value = formattedDate((obj[0]['dFechaNacimiento']), '0');
                }

                document.getElementById("txtDireccion").value = obj[0]['vDireccion'];
                document.getElementById("txtObservaciones").value = obj[0]['vObservaciones'];
                document.getElementById("txtHCL").value = obj[0]['vCodigoPaciente'];

                if (obj[0]['cGenero'] == '1')
                {
                    document.getElementById("rdbMasculino").checked = true;
                    document.getElementById("rdbFemenino").checked = false;
                } else if (obj[0]['cGenero'] == '0')
                {
                    document.getElementById("rdbMasculino").checked = false;
                    document.getElementById("rdbFemenino").checked = true;
                }

                document.getElementById("chkEsMoroso").checked = false
                if (obj[0]['cEsMoroso'] == '1')
                {
                    document.getElementById("chkEsMoroso").checked = true;

                } else if (obj[0]['cEsMoroso'] == '0')
                {
                    document.getElementById("chkEsMoroso").checked = false;
                }

                document.getElementById("txtDNI").value = obj[0]['vDNI'];
                document.getElementById("txtCentroTrabajo").value = obj[0]['vLugarTrabajo'];
                document.getElementById("txtProcedencia").value = obj[0]['vProcedencia'];
                document.getElementById("ddlEstadoCivil").value = obj[0]['nEstadoCivil'];

                document.getElementById("txtOcupacion").value = obj[0]['vOcupacion'];
                document.getElementById("ddlEstado").value = obj[0]['nEstado'];

                $('#imagePreviewUser').removeAttr("src").attr('src', "");
                $('#imagePreviewUser').attr('src', "../../Modules/Paciente/upload/" + obj[0]['vCodigoPaciente'] + "." + obj[0]['iFoto']+"?1.1.0");
                $('#imagePreviewUser').attr('width', '120px');
                $('#imagePreviewUser').attr('height', '120px');

                Cargo = true;
            } 
        }
    });
}
;

function FnInsetarPaciente()
{
    var localRegistro = document.getElementById("ddlLocalRegistro").value;
    var localAtencion = document.getElementById("ddlLocalAtencion").value;
    var nombrePaciente = document.getElementById("txtNombrePaciente").value;
    var apellidoPaterno = document.getElementById("txtApellidoPaterno").value;
    var apellidoMaterno = document.getElementById("txtApellidoMaterno").value;
    
    var fechaNacimiento = document.getElementById("txtFechaNacimiento").value;
    fechaNacimiento = formattedDate(fechaNacimiento, '1');
    
    var direccion = document.getElementById("txtDireccion").value;
    var observaciones = document.getElementById("txtObservaciones").value;
    var genero = ((document.getElementById("rdbMasculino").checked) ? "1" : (document.getElementById("rdbFemenino").checked) ? "0" : "");
    var medioContactoFavorito = "Prueba";
    var esMoroso = ((document.getElementById("chkEsMoroso").checked) ? "1" : "0");
    var rutaFoto = "nueva";
    var numeroDNI = document.getElementById("txtDNI").value;
    var lugarTrabajo = document.getElementById("txtCentroTrabajo").value;
    var procedencia = document.getElementById("txtProcedencia").value;
    var estadoCivil = document.getElementById("ddlEstadoCivil").value;
    var ocupacion = document.getElementById("txtOcupacion").value;
    var usuarioCrea = "1";
    var HCL = document.getElementById("txtHCL").value;
    
    if (nCodigoPaciente != '0')
    {
        var file_data = $("#file").prop("files")[0];

        if (typeof file_data === 'undefined')
            file_data = "|";
        else
            file_data = file_data.name;
            
        //Update
        $.ajax({
            type: 'POST',
            url: '../../App_Code/Controller/PacienteController.php?tipo=u',
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
                p_vCorreo: "",
                p_nUsuarioCrea: usuarioCrea,
                p_vHCL: HCL
            },
            success: function (resp)
            {
                InsertarDetallePaciente(nCodigoPaciente);
                
                if (typeof file_data === 'undefined')
                {
                    var file_data = $("#file").prop("files")[0];   // Getting the properties of file from file field
                    var form_data = new FormData();                  // Creating object of FormData class
                    form_data.append("file", file_data);              // Appending parameter named file with properties of file_field to form_data
                    form_data.append("user_id", 123);                 // Adding extra parameters to form_data

                    $.ajax({
                        url: "upload.php?nombreImagen="+HCL,
                        dataType: 'script',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post'
                    });
                }
            }
        });
    }
    else
    {
        if (nombrePaciente == "" || apellidoPaterno == "")
        {
            alert("Es necesario completar los datos de paciente");
        } 
        else
        {
            var file_data = $("#file").prop("files")[0];

            if (typeof file_data === 'undefined')
                file_data = "";
            else
                file_data = file_data.name;
            //Create
            $.ajax({
                type: 'POST',
                url: '../../App_Code/Controller/PacienteController.php?tipo=c',
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
                    p_iFoto: rutaFoto,
                    p_vDNI: numeroDNI,
                    p_vLugarTrabajo: lugarTrabajo,
                    p_vProcedencia: procedencia,
                    p_nEstadoCivil: estadoCivil,
                    p_vOcupacion: ocupacion,
                    p_nUsuarioCrea: usuarioCrea,
                    p_vHCL: HCL,
                    p_nombreImage: file_data
                },
                success: function (resp)
                {
                    //Imprimir mensaje conformidad
                    var codigo,correlativo;
                    codigo = resp.split("|")[0];
                    correlativo = resp.split("|")[1];
                                        
                    nCodigoPaciente = codigo;
                    InsertarDetallePaciente(codigo);
                    
                    if (typeof file_data === 'undefined')
                    {
                        var file_data = $("#file").prop("files")[0];   // Getting the properties of file from file field
                        var form_data = new FormData();                  // Creating object of FormData class
                        form_data.append("file", file_data);              // Appending parameter named file with properties of file_field to form_data
                        form_data.append("user_id", 123);                 // Adding extra parameters to form_data

                        $.ajax({
                            url: "upload.php?nombreImagen="+correlativo,
                            dataType: 'script',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post'
                        });
                    }
                }
            });
        }
    }
}
;

function FnAddDetail_Contact()
{
    //Operador
    var iOperador = document.getElementById("ddlOperador").selectedIndex;
    //Tipo Telefono
    var iTipoTelefono = document.getElementById("ddlTipoTelefono").selectedIndex;
    //ID
    var total = $("#GridViewPacientesContacto").jqGrid('getGridParam', 'records');
    total += 1;

    var p = $('#GridViewPacientesContacto').getGridParam();
    if (p.data)
    {
        var newData = {
            Codigo: total,
            CodigoTelefono: 0,
            CodigoPaciente: 0,
            CodOperador: document.getElementById("ddlOperador").value,
            Operador: document.getElementById("ddlOperador").options[iOperador].text,
            CodTipoTelefono: document.getElementById("ddlTipoTelefono").value,
            TipoTelefono: document.getElementById("ddlTipoTelefono").options[iTipoTelefono].text,
            vTelefono: document.getElementById("txtTelefono").value,
            esWhatsApp: ((document.getElementById("chkEsWhatsApp").checked) ? "1" : "0"),
            WhatsApp: ((document.getElementById("chkEsWhatsApp").checked) ? "Sí" : "No"),
            Titular: document.getElementById("txtTitular").value

        };
        var rowId = total;

        $("#GridViewPacientesContacto").jqGrid('addRowData', rowId, newData);
    }
}
;
function FnAddDetail_RedSocial()
{
    //Tipo Red Social
    var iTipoRedSocial = document.getElementById("ddlTipoRedSocial").selectedIndex;

    var total = $("#GridViewPacientesRedSocial").jqGrid('getGridParam', 'records');
    total += 1;

    var p = $('#GridViewPacientesRedSocial').getGridParam();
    if (p.data)
    {
        var newData = {
            nCodigoRedSocial: total,
            nCodigoPaciente: 0,
            nTipoRedSocial: document.getElementById("ddlTipoRedSocial").value,
            vTipoRedSocial: document.getElementById("ddlTipoRedSocial").options[iTipoRedSocial].text,
            vTitular: document.getElementById("txtTitularRedSocial").value,
            bPrincipal: ((document.getElementById("chkEsPrincipal").checked) ? "1" : "0"),
            vPrincipal: ((document.getElementById("chkEsPrincipal").checked) ? "Sí" : "No"),
            vDireccion: document.getElementById("txtDirecciónRedSocial").value
        };
        var rowId = total;
        $("#GridViewPacientesRedSocial").jqGrid('addRowData', rowId, newData);
    }
}
;
function FnDeleteDetail_Contacto(codigo)
{
    $('#GridViewPacientesContacto').jqGrid('delRowData', codigo);
}
;
function FnDeleteDetail_RedSocial(codigo)
{
    $('#GridViewPacientesRedSocial').jqGrid('delRowData', codigo);
}
;
function InsertarDetallePaciente(nCodigoPaciente)
{
    //Insetando detalle de contactos:
    //**********************************************************************
    var rowsContacto = $('#GridViewPacientesContacto').jqGrid('getRowData');
    var jsonContacto = JSON.stringify(rowsContacto);

    $.ajax({
        type: 'POST',
        url: '../../App_Code/Controller/PacienteController.php?tipo=cDetalleContacto',
        data:
                {
                    p_nCodigoPaciente: nCodigoPaciente,
                    p_data: jsonContacto

                },
        success: function (resp)
        {
            //console.log(resp);
        }
    });
    //Insetando Red Social:
    //**********************************************************************
    var rowsRedSocial = $('#GridViewPacientesRedSocial').jqGrid('getRowData');
    var jsonRedSocial = JSON.stringify(rowsRedSocial);

    $.ajax({
        type: 'POST',
        url: '../../App_Code/Controller/PacienteController.php?tipo=cDetalleRedSocial',
        data:
                {
                    p_nCodigoPaciente: nCodigoPaciente,
                    p_data: jsonRedSocial
                },
        success: function (resp)
        {
            //console.log(resp);
        }
    });
    
    //here
    showMessageWGD("Paciente guardado correctamente.");
}
;

jQuery("#file").change(function (){

    var file = this.files[0];
    var imagefile = file.type;

    var match = ["image/jpeg", "image/png", "image/jpg"];
    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
    {
        $('#imagePreviewUser').attr('src', '../../Inspinia/img/user_new.jpg');

    }
    else
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
;

//$(document).on("click", "#btnGrabar", function () {

//    var file_data = $("#file").prop("files")[0];   // Getting the properties of file from file field
//
//    var form_data = new FormData();                  // Creating object of FormData class
//    form_data.append("file", file_data);              // Appending parameter named file with properties of file_field to form_data
//    form_data.append("user_id", 123);                 // Adding extra parameters to form_data
//    
//    $.ajax({
//        url: "upload.php",
//        dataType: 'script',
//        cache: false,
//        contentType: false,
//        processData: false,
//        data: form_data,
//        type: 'post'
//    });
//});





                