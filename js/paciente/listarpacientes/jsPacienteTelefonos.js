$(function() {
    
    $("#btnAgregarTelefonos").bind("click", function(event) {
        var codigopaciente = $("#hdn_codigopaciente").val();
        //alert(codigopaciente);
        //FnAddDetail_Contact(codigopaciente);
        FnAddDetail_Telefono(codigopaciente);
    });
   
    //qryPacienteTelefonos();
});

//INSERTAR, EDITAR TELEFONO
function FnAddDetail_Telefono()
{      
    //var    CodigoTelefono= 0;
    var CodigoPaciente = $("#hdn_codigopaciente").val();
    var    CodOperador= document.getElementById("ddlOperador").value;//ok
    //Operador
    //var iOperador = document.getElementById("ddlOperador").selectedIndex;//ok
    var iOperador = $("#ddlOperador option:selected").val();//ok
    //var    Operador= document.getElementById("ddlOperador").options[iOperador].text;//ok
    var    Operador= $("#ddlOperador option:selected").text();//ok
    var    CodTipoTelefono= document.getElementById("ddlTipoTelefono").value;
    //Tipo Telefono
    var iTipoTelefono = document.getElementById("ddlTipoTelefono").selectedIndex;//ok
    var    TipoTelefono= document.getElementById("ddlTipoTelefono").options[iTipoTelefono].text;//ok
    var    vTelefono= document.getElementById("txtTelefono").value;//ok
    var    esWhatsApp= ((document.getElementById("chkEsWhatsApp").checked) ? "1" : "0");//ok
    var    WhatsApp= ((document.getElementById("chkEsWhatsApp").checked) ? "Sí" : "No");//ok
    var    Titular= document.getElementById("txtTitular").value;//ok
    console.log("codigopaciente " +CodigoPaciente);
    console.log("CodOperador " +CodOperador);
    console.log("iOperador " +iOperador);
    console.log("Operador " +Operador);
    console.log("CodTipoTelefono " +CodTipoTelefono);
    console.log("iTipoTelefono " +iTipoTelefono);
    console.log("TipoTelefono " +TipoTelefono);
    console.log("vTelefono " +vTelefono);
    console.log("esWhatsApp " +esWhatsApp);
    console.log("WhatsApp " +WhatsApp);
    console.log("Titular " +Titular);
    
    var metodo='';
    if($("#hdn_codigotelefono").val()>0){
        metodo="pacienteTelefonoUpd";
    }else{
        metodo="pacienteTelefonoIns"
    }
    $.ajax({
        //url: 'paciente/pacienteTelefonoIns',
        url: metodo,
        cache: false,
        type: 'POST',
        data: {
            //p_nCodigoTelefono: CodigoPaciente,
            p_metodo: metodo,
            p_nCodigoPaciente: CodigoPaciente,
            p_nCodigoOperador: iOperador,
            p_vDescripcionOperador: Operador,
            p_nTipoTelefono: iTipoTelefono,
            p_vTipoTelefono: TipoTelefono,
            p_bEsWhatsapp: esWhatsApp,
            p_vTitular: Titular,
            p_vTelefono: vTelefono,
            p_nCodigoTelefono:$("#hdn_codigotelefono").val()
        },
        success: function(data) {
            //alert(data);
            if(data==1){
                //$('#frm-ins-telefonos')[0].reset();
                alert("Exito");
                //qryPacienteTelefonos();
                $("#hdn_codigotelefono").val(0)
                $("#txtTelefono").val("")
                $("#txtTitular").val("")
                getDatosTelefonos(CodigoPaciente);
            }else{
                alert("revisar")
            }
        },
        error: function(er) {
            console.log("error".er);
        }
    });
}


/*function qryPacienteTelefonos() {
    $("#listaPacienteTelefonos").html("Cargando");
    //msgLoading("#listaRoles", "");
    $.ajax({
        type: "POST",
        //url: "paciente/qryPacienteTelefonos",
        url: "qryPacienteTelefonos",
        cache: false,
        data: {
            tipo: '',
            hdn_codigopaciente:$("#hdn_codigopaciente").val()
        },
        success: function (data) {
            //alert("hhuhuh")
            $("#listaPacienteTelefonos").html(data);
        },
        error: function () {
            alert("error");
        }
    });
}*/