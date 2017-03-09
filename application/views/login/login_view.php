<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dluanas | Login</title>
        <link rel="shortcut icon" href="<?php echo URL_IMG; ?>images/favicon.ico" />
        <!-- Le styles -->
        <link href="<?php echo URL_PLU_CSS; ?>bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL_PLU_CSS; ?>animate.css" rel="stylesheet">
        <link href="<?php echo URL_PLU_CSS; ?>style.css" rel="stylesheet">
    </head>
    
    <body class="gray-bg">
        <div class="loginColumns animated fadeInDown">
            <div class="row">
                <div class="col-md-6">
                    <a href="javascript:void(0)" title="Logo">
                        <img src="<?php echo URL_IMG; ?>logo/portadaAdmin1.jpg" width="400" height="200" />
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="ibox-content">
                        <form class="m-t" role="form" action="#" id="loginForm" name="loginForm">
                            <div class="form-group">
                                <input id="username" type="text" class="form-control" placeholder="Usuario" required="" value="cri">
                            </div>
                            <div class="form-group">
                                <input id="password" name="password"  type="password" class="form-control" placeholder="password" required="" value="1234">
                            </div>
                            <button type="submit" style="background-color: #65acff;" type="button" class="btn btn-primary block full-width m-b"  id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Ingresar</button>
                            <div id="cargaBtn"></div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    ©Developers Profesional Copyright 
                </div>
                <div class="col-md-6 text-right">
                    <small>©2017</small>
                </div>
            </div>
        </div>
    </body>

    <link href="<?php echo URL_PLU; ?>pnotify/pnotify.custom.min.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo URL_PLU_JS ?>jquery-2.1.js"></script>
    <script type="text/javascript" src="<?php echo URL_PLU; ?>forms/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_PLU; ?>forms/validate/localization/messages_es.js"></script>
    <script type="text/javascript" src="<?php echo URL_PLU; ?>pnotify/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS ?>jsGeneral.js"></script>

    <script type="text/javascript">
        $(function() {
            $("#loginForm").validate({
                submitHandler: function() {
                    msgLoadSave("#cargaBtn", "#loginBtn");
                    //var url_base = $("#idBaseUrl").val();
                    var url_base = "<?php echo URL_MAIN; ?>"
                    //alert(url_base)
                    var rand = Math.random() * 11;
                    //$.post("http://localhost:81/siscom/usuario/validar",{//get
                    $.post(url_base + "usuarios/validar", {//get
                        rdn: rand,
                        username: $("#username").val(),
                        password: $("#password").val()
                    }, function(data) {
                        msgLoadSaveRemove("#loginBtn");
                        console.log(data);
                        if (data == "1") {
                            //form.submit();
                            //window.location="http://localhost:81/siscom/principal";
                            window.location = url_base + "dashboard";
                            mensajeExito("Acceso Permitido");
                            //location.href='usuario/validar';   
                        } else {
                            //alert("error");
                            //console.log("error");
                            mensajeAdvertencia("Acceso Incorrecto");
                            //window.location="http://localhost:81/siscom/usuario/login";
                            //window.location=url_base+"usuario/login";
                        }
                    });
                },
                rules: {
                    username: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    username: {
                        required: "Es Obligatorio",
                        minlength: "Minimo 3 caracteres"
                    },
                    password: {
                        required: "Es Obligatorio",
                        minlength: "Minimo 3 caracteres"
                    }
                }
            });
        });
    </script>
</html>