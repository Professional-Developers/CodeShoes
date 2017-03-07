$(function(){
    //$("#txtcPerTelefono").mask("(044) 26-18-11", {completed:function(){alert("Callback action after complete");}});
    //$("#txtcPerTelefono").mask("(999) 999-9999");
    //$("#txtcPerTelefono").mask("(999) 999999");
    //$("#txtcPerTelefono").mask("(999) 99-99-99");
    soloNumeros("#txtcPerDni","keypress");
    soloNumeros("#txtcPerCelular","keypress");
    $('#frmPersonaInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#message","#btnRegistrar");
            $.ajax({
                url:'persona/registrarIns',
                type:'post',
                data:$("#frmPersonaInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrar");
                    cleanForm("#frmPersonaInsa");
                    
                    if (data==1) {
                        mensajeExito("Ingreso Persona Exitosa");
                    } else{
                        console.log("Error Registro Persona");
                    }
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            txtcPerNombres:{
                required:true,
                minlength   : 1
            },
            txtcPerApellidoMaterno:{
                required:true,
                minlength   : 1
            },
            txtcPerApellidoPaterno:{
                required:true,
                minlength   : 1
            },
            txtcPerDni:{
                required:true,
                minlength   : 8,
                digits      : true
            },
            txtcPerDireccion:{
                required:true
            },
            txtcPerCelular:{
                digits:true
            }
        },
        messages: {
            txtcPerNombres: {
                required    : "Ingrese el Nombre de la Persona.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerApellidoMaterno: {
                required    : "Ingrese Apellido Materno.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerApellidoPaterno: {
                required    : "Ingrese Apellido Paterno.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerDni: {
                required    : "Ingrese DNI.",
                minlength   : "Minimo {0} caracteres.",
                digits      : "Ingrese solo numeros."
            },
            txtcPerDireccion: {
                required    : "Ingrese Direccion."
            },
            txtcPerCelular:{
                digits: "Ingrese solo numeros"
            }
        }
    // ,debug: true
    });
});