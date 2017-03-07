$(function () {
    //alert("hi");
    $("#btnAgregarCorreo").bind("click", function (event) {
        //alert("hola");
        //alert("hola");
        //var codigopaciente = $("#hdn_codigopaciente").val();
        FnAddDetail_RedSocial();
        //ert($("#hdn_codigopaciente").val());
        
    });
    qryPacienteCorreos();
});
function FnAddDetail_RedSocial()
{
    //nCodigoPaciente: 0,
    var CodigoPaciente = $("#hdn_codigopaciente").val();
    //Tipo Red Social
    var iTipoRedSocial = document.getElementById("ddlTipoRedSocial").selectedIndex;//ok       
    var nTipoRedSocial = document.getElementById("ddlTipoRedSocial").value;//ok
    var vTipoRedSocial = document.getElementById("ddlTipoRedSocial").options[iTipoRedSocial].text;//ok
    var vTitular = document.getElementById("txtTitularRedSocial").value;//ok
    var bPrincipal = ((document.getElementById("chkEsPrincipal").checked) ? "1" : "0");//ok
    var vPrincipal = ((document.getElementById("chkEsPrincipal").checked) ? "Sí" : "No");//ok
    var vDireccion = document.getElementById("txtDirecciónRedSocial").value;

    console.log("CodigoPaciente " + CodigoPaciente);
    console.log("nTipoRedSocial " + nTipoRedSocial);
    console.log("vTipoRedSocial " + vTipoRedSocial);
    console.log("vTitular " + vTitular);
    console.log("bPrincipal " + bPrincipal);
    console.log("vPrincipal " + vPrincipal);
    console.log("vDireccion " + vDireccion);
    
    var metodo='';
    if($("#hdn_codigocorreo").val()>0){
        metodo="pacienteCorreoUpd";
    }else{
        metodo="pacienteCorreoIns"
    }
    
     $.ajax({
        url: metodo,
        cache: false,
        type: 'POST',
        data: {
            //p_nCodigoTelefono: CodigoPaciente,
            //nCodigoRedSocial: 
            p_metodo: metodo,
            nCodigoPaciente: CodigoPaciente,
            vDireccion : vDireccion,
            nTipoRedSocial : nTipoRedSocial,
            vTipoRedSocial : vTipoRedSocial,
            vTitular : vTitular,
            bPrincipal: bPrincipal,
            p_nCodigoCorreo:$("#hdn_codigocorreo").val()
        },
        success: function(data) {
            //alert(data);
            if(data==1){
                //$('#frm-ins-correos')[0].reset();
                alert("Exito");
                $("#hdn_codigocorreo").val(0)
                $("#txtDirecciónRedSocial").val("")
                $("#txtTitularRedSocial").val("")
                qryPacienteCorreos();
            }else{
                alert("revisar")
            }
        },
        error: function(er) {
            console.log("error".er);
        }
    });
}

function qryPacienteCorreos() {
    $("#listaPacienteCorreos").html("Cargando");
    //msgLoading("#listaRoles", "");
    $.ajax({
        type: "POST",
        //url: "usuario/qryPersonaUsu",
        //url: "rol/qryRolUsu",
        //url: "paciente/qryPacienteTelefonos",
        url: "qryPacienteCorreos",
        cache: false,
        data: {
            tipo: '',
            hdn_codigopaciente:$("#hdn_codigopaciente").val()
        },
        success: function (data) {
            //alert("hhuhuh")
            $("#listaPacienteCorreos").html(data);
        },
        error: function () {
            alert("error");
        }
    });
}

/*function FnAddDetail_RedSocial()
 {
 //Tipo Red Social
 var iTipoRedSocial = document.getElementById("ddlTipoRedSocial").selectedIndex;
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
 }*/