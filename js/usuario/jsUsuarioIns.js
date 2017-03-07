$(function () {
    soloNumeros("#txtcPerDni", "keypress");
    $("#txtcPerDni").keyup(function (evt) {
        //alert($("#txt_dni_asignar").val().length)
        if (evt.keyCode == 13) {
            evt.preventDefault();
            var dni = $("#txtcPerDni").val();
            if (dni != '' && dni.length == 8) {
                loadBuscarPersonas();
            } else {
                //alert("ingresa un dni valido");
                mensajeAdvertencia("Ingresa un dni valido");
            }
        }
    }); //ok

    $("#btn_fndPerson").bind({
        click: function (evt) {
            evt.preventDefault();
            var dni = $("#txtcPerDni").val();
            if (dni != '' && dni.length == 8) {
                loadBuscarPersonas();
            } else {
                //alert("ingresa un dni valido");
                mensajeAdvertencia("Ingresa un dni valido");
            }
        }
    });
    $("#btnCancelar").bind({
        click: function (evt) {
            evt.preventDefault();
            //LimpiarFormulario();
            cleanForm("#frmUsuarioIns");
        }
    })
    /*$("#btnRegistrarUsuario").bind({
     click:function(evt){
     evt.preventDefault();
     registrarUsuario();
     }
     })*/
    $('#frmUsuarioIns').validate({
        submitHandler: function () {
            if ($("#txt_nPerId").val() == '' || $("#txt_nPerId").val()==0) {
                mensajeAdvertencia("No se ha seleccionado una persona");
            } else {
                msgLoadSave("#message", "#btnRegistrarUsuario");

                $.ajax({
                    url: 'usuario/insUsuario',
                    type: 'post',
                    data: {
                        txt_nPerId: $("#txt_nPerId").val(),
                        txtUsuario: $("#txtUsuario").val(),
                        txtClave: $("#txtClave").val(),
                        //cboTipoUser : $("#cboTipoUser option:selected").val()
                        nIdRol: $("#cboTipoRol option:selected").val()
                    },
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        cleanForm("#frmUsuarioIns");
                        msgLoadSaveRemove("#btnRegistrarUsuario");
                        if (data == "1") {
                            mensajeExito("Ingreso Usuario Exitoso");
                        } else {
                            console.log("Error Registro Usuario");
                        }
                    },
                    error: function (error) {
                        //alert(error);
                    }
                });
            }


        },
        rules: {
            txtcPerDni: {
                required: true,
                digits: true
            },
            txtUsuario: {
                required: true
            },
            txtClave: {
                required: true,
                minlength: 3
                        //maxlength:11,
                        //lettersonly: true
            },
            cboTipoRol: {
                required: true
            }
        },
        messages: {
            txtcPerDni: {
                required: "Ingrese DNI.",
                digits: "solo numeros"
            },
            txtUsuario: {
                required: "Ingrese Usuario."
            },
            txtClave: {
                required: "Ingrese Clave.",
                minlength: "Minimo 3 caracteres."
            },
            cboTipoRol: {
                required: "Seleccione Rol."
            }
        }
        // ,debug: true
    });
});


function registrarUsuario() {
    $.ajax({
        url: 'usuario/insUsuario',
        cache: false,
        type: 'post',
        data: {
            txt_nPerId: $("#txt_nPerId").val(),
            txtUsuario: $("#txtUsuario").val(),
            txtClave: $("#txtClave").val(),
            cboTipoUser: $("#cboTipoUser option:selected").val()
        },
        success: function (data) {
            cleanForm("#frmUsuarioIns");
            if (data == "1") {
                //mensaje("En hora buena registro correcto",'e');
                mensajeExito("Ingreso Usuario Exitoso");
            } else {
                console.log("Error Registro Usuario");
            }
        },
        error: function (er) {
            console.log(er);
        }
    })
}
function loadBuscarPersonas() {
    msgLoading("#infopersona", "Cargando");
    //alert("hi");
    $.ajax({
        url: 'persona/buscarxDni',
        type: 'post',
        cache: false,
        data: {
            dni: $("#txtcPerDni").val()
        },
        success: function (data) {
            $("#infopersona").html(data);
        },
        error: function (er) {
            console.log(er);
        }
    });
}