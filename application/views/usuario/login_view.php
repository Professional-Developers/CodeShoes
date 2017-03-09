<!DOCTYPE html>
<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--<meta charset="utf-8" />-->
        <meta name="description" content="Proyecto Calzado Sarita" />
        <meta name="viewport" content="width=device-width, minimun-scale=1, maximun-scale=1" />
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Loguin</title>

        <!-- Le styles -->
        <link href="<?php echo URL_CSS; ?>bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo URL_CSS; ?>bootstrap/bootstrap-responsive.css" rel="stylesheet" />
        <link href="<?php echo URL_CSS; ?>supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL_CSS; ?>icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_PLU; ?>forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo URL_PLU; ?>misc/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />

        <!-- Main stylesheets -->
        <link href="<?php echo URL_CSS; ?>main.css" rel="stylesheet" type="text/css" /> 

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo URL_MAIN; ?>images/favicon.ico" />
        <script type="text/javascript" src="<?php echo URL_JS; ?>libs/modernizr.js"></script>
    </head>
    <body class="loginPage">
        <div class="container">
            <div class="loginContainer">
                <input type="hidden" id="idBaseUrl" value="<?php echo URL_MAIN;?>" />
                <!--<form class="form-horizontal" method="post" action="usuario/validar" id="loginForm" role="form" >-->
                <form class="form-horizontal" id="loginForm" name="loginForm">
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="username">Usuario:</label>
                        <div class="col-lg-12">
                            <input id="username" type="text" name="username" placeholder="jperez" class="form-control" required placeholder="Enter your username ...">
                            <span class="icon16 icomoon-icon-user right gray marginR10"></span>
                        </div>
                    </div><!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="password">Password:</label>
                        <div class="col-lg-12">
                            <input id="password" type="password" name="password" placeholder="@123XYZ" required class="form-control">
                            <span class="icon16 icomoon-icon-lock right gray marginR10"></span>
                            <!--<span class="forgot help-block"><a href="#">Forgot your password?</a></span>-->
                        </div>
                    </div><!-- End .form-group  -->
                    <div class="form-group">
                        <div class="col-lg-12 clearfix form-actions">
                            <div class="checkbox left">
                                <!--<label><input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" /> Keep me logged in</label>-->
                            </div>
                            <button type="submit" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Ingresar</button>
                            <div id="cargaBtn"></div>
                        </div>
                    </div><!-- End .form-group  -->
                </form>
            </div>

        </div><!-- End .container -->

        <!-- Le javascript
        ================================================== -->
        <!--<script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
        <script  type="text/javascript" src="<?php echo URL_JS ?>jquery-1.83.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS ?>bootstrap/bootstrap.js"></script>  
        <!-- <script type="text/javascript" src="<php echo URL_JS_AD ?>plugins/misc/touch-punch/jquery.ui.touch-punch.min.js"></script> -->
        <!-- <script type="text/javascript" src="<php echo URL_JS_AD ?>plugins/misc/ios-fix/ios-orientationchange-fix.js"></script> -->
        <script type="text/javascript" src="<?php echo URL_PLU; ?>forms/validate/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_PLU; ?>forms/validate/localization/messages_es.js"></script>
        <script type="text/javascript" src="<?php echo URL_PLU; ?>forms/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_PLU; ?>misc/pnotify/jquery.pnotify.min.js"></script>

        <script type="text/javascript" src="<?php echo URL_JS ?>jsGeneral.js"></script>  
        <script type="text/javascript">
            // document ready function
            $(document).ready(function() {
                //------------- Options for Supr - admin tempalte -------------//
                //                
                //  window.location="http://localhost:81/siscom/usuario/validar";
                //$("input, textarea, select").not('.nostyle').uniform();
                $("#loginForm").validate({
                    
                    submitHandler: function() {
                        msgLoadSave("#cargaBtn","#loginBtn");
                        var url_base = $("#idBaseUrl").val();
                        var rand=Math.random()*11;
                        //$.post("http://localhost:81/siscom/usuario/validar",{//get
                        $.post(url_base+"usuario/validar",{//get
                            rdn:rand,
                            username:$("#username").val(),
                            password:$("#password").val()
                        }, function(data){
                            msgLoadSaveRemove("#loginBtn");
                            console.log(data);
                            if(data=="1"){
                                //form.submit();
                                //window.location="http://localhost:81/siscom/principal";
                                window.location=url_base+"principal";
                                mensajeExito("Acceso Permitido");
                                //location.href='usuario/validar';   
                            }else{
                                //alert("error");
                                console.log("error");
                                mensajeAdvertencia("Acceso Incorrecto");
                                //window.location="http://localhost:81/siscom/usuario/login";
                                //window.location=url_base+"usuario/login";
                            }
                        }); 
                    },
                    rules: {
                        username: {
                            required: true,
                            minlength: 4
                        },
                        password: {
                            required: true,
                            minlength: 4
                        }  
                    },
                    messages: {
                        username: {
                            required: "Es Obligatorio",
                            minlength: "Minimo 4 caracteres"
                        },
                        password: {
                            required: "Es Obligatorio",
                            minlength: "Minimo 4 caracteres"
                        }
                    }   
                });
            });
        </script> 

    </body>

</html>
