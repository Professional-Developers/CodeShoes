<!DOCTYPE html>
<head>
    <?php $title = isset($title) ? $title : "Sistema" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta Http-Equiv="Cache-Control" Content="no-cache">
    <meta Http-Equiv="Pragma" Content="no-cache">
    <meta Http-Equiv="Expires" Content="0">
    <meta Http-Equiv="Pragma-directive: no-cache">
    <meta Http-Equiv="Cache-directive: no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="Content-type" content="text/html" charset="utf-8" />
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo URL_IMG; ?>favicon.ico" />
    <link href="<?php echo URL_PLU_CSS ?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo URL_PLU_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL_PLU_INSPINIA ?>font-awesome/css/awesome.css" rel="stylesheet">
    <link href="<?php echo URL_PLU_CSS ?>animate.css" rel="stylesheet">

    <link href="<?php echo URL_PLU_CSS ?>plugins/jQueryUI/jquery-ui-1.10.4.custom.css" rel="stylesheet">
    <!--<link href="<?php echo URL_PLU_CSS ?>plugins/jqGrid/ui.css" rel="stylesheet">-->
    <link href="<?php echo URL_PLU_CSS ?>style.css" rel="stylesheet">
    <link href="<?php echo URL_PLU_CSS ?>plugins/dropzone/basic.css" rel="stylesheet">
    <link href="<?php echo URL_PLU_CSS ?>plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="<?php echo URL_PLU_CSS ?>plugins/chosen/chosen.css" rel="stylesheet">
    <link href="<?php echo URL_PLU_CSS ?>plugins/toastr/toastr.css" rel="stylesheet">
<!--    <link href="<?php echo URL_PLU; ?>pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />-->
    <link href="<?php echo URL_PLU; ?>pnotify/pnotify.custom.min.css" type="text/css" rel="stylesheet" />


    <!-- archivos js-->
    <script src="<?php echo URL_PLU_JS; ?>jquery-2.1.js" type="text/javascript"></script>
    <!--<script src="<?php echo URL_PLU_JS; ?>jquery-1.12.js" type="text/javascript"></script>-->

    <script src="<?php echo URL_JS; ?>URIGlobales.js" type="text/javascript"></script>
    <script src="<?php echo URL_PLU_JS; ?>plugins/jquery-ui/jquery-ui.js" type="text/javascript"></script>
    <script src="<?php echo URL_PLU; ?>forms/validate/jquery.validate.min.js"  type="text/javascript"></script>
    <!--<script src="<?php echo URL_PLU; ?>pnotify/jquery.pnotify.min.js" type="text/javascript"></script>-->
    <script src="<?php echo URL_PLU; ?>pnotify/pnotify.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo URL_PLU; ?>forms/validate/localization/messages_es.js" type="text/javascript"></script>
    <script src="<?php echo URL_JS ?>jsGeneral.js" type="text/javascript"></script>
    <script src="<?php echo URL_JS ?>jsValidacionGeneral.js" type="text/javascript" ></script>
    <script src="<?php echo URL_PLU_JS; ?>bootstrap.js" type="text/javascript" ></script>
    <script src="<?php echo URL_PLU_JS; ?>plugins/metisMenu/jquery.js" type="text/javascript" ></script>
    <script src="<?php echo URL_PLU_JS; ?>plugins/slimscroll/jquery.slimscroll.js" type="text/javascript" ></script>
    <!-- Peity -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/peity/jquery.peity.js" type="text/javascript" ></script>
    <!-- jqGrid -->
<!--    <script src="<?php echo URL_PLU_JS; ?>plugins/jqGrid/i18n/grid.js" type="text/javascript" ></script>
    <script src="<?php echo URL_PLU_JS; ?>plugins/jqGrid/jquery.jqGrid.js" type="text/javascript" ></script>-->
    <!-- Custom and plugin javascript -->
    <script src="<?php echo URL_PLU_JS; ?>inspinia.js" type="text/javascript" ></script>
    <!--<script src="<?php echo URL_PLU_JS; ?>plugins/pace/pace.js" type="text/javascript" ></script>-->

    <!-- Chosen -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/chosen/chosen.js" type="text/javascript" ></script>
    <!-- JSKnob -->
    <!--<script src="<?php echo URL_PLU_JS; ?>plugins/jsKnob/jquery.js"></script>-->
    <!-- Input Mask-->
    <!--<script src="<?php echo URL_PLU_JS; ?>plugins/jasny/jasny-bootstrap.js" type="text/javascript" ></script>-->
    <!-- Data picker -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/datapicker/bootstrap-datepicker.js" type="text/javascript" ></script>
    <!-- NouSlider -->
    <!--<script src="<?php echo URL_PLU_JS; ?>plugins/nouslider/jquery.nouislider.js" type="text/javascript" ></script>-->
    <!-- Switchery -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/switchery/switchery.js" type="text/javascript" ></script>
    <!-- IonRangeSlider -->
    <!--<script src="<?php echo URL_PLU_JS; ?>plugins/ionRangeSlider/ion.rangeSlider.js" type="text/javascript" ></script>-->
    <!-- iCheck -->
<!--    <script src="<?php echo URL_PLU_JS; ?>plugins/iCheck/icheck.js" type="text/javascript" ></script>-->
    <!-- MENU -->
    <!--<script src="<?php echo URL_PLU_JS; ?>plugins/metisMenu/jquery.js"></script>-->
    <!-- Color picker -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/colorpicker/bootstrap-colorpicker.js" type="text/javascript" ></script>
    <!-- Clock picker -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/clockpicker/clockpicker.js" type="text/javascript" ></script>
    <!-- Image cropper -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/cropper/cropper.js" type="text/javascript" ></script>
    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/fullcalendar/moment.js" type="text/javascript" ></script>
    <!-- Toastr script -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/toastr/toastr.js" type="text/javascript" ></script>
    <!-- DataTables script -->
    <script src="<?php echo URL_PLU_JS; ?>plugins/dataTables2/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo URL_PLU_JS; ?>plugins/dataTables2/dataTables.responsive.min.js" type="text/javascript"></script>
    <link href="<?php echo URL_PLU_CSS ?>dataTables2/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo URL_PLU_CSS ?>dataTables2/responsive.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <!--MENU-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="<?php echo URL_PLU_IMG ?>profile_small.jpg">
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold"><?php echo $this->session->userdata('cUsuUsuario')?></strong>
                                    </span>
                                    <span class="block m-t-xs">
                                        <strong class="font-bold"><?php echo $this->session->userdata('Nombres')?></strong>
                                    </span>
                                    <span class="text-muted text-xs block"><?php echo $this->session->userdata('Rol')?><b class="caret"></b>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <?php
                    $opciones = $this->loaders->get_menu();
                    //print_p($opciones);exit;
                    $count = count($opciones);
                    for ($i = 0; $i < $count; $i++) {
                        //$SubMenu = ( ( $opciones[$i]["active"] === 'block' ) ? " hasUl drop" : "" );
                        ?>               
                        <li class=""> <!-- ojo -->
                            <a href="javascript:void(0)"><i class="<?php echo $opciones[$i]["icon"]; ?>"></i>
                                <span class="nav-label">
                                    <?php echo $opciones[$i]["menu"]; ?>
                                </span> <span class="fa arrow"></span>
                            </a>
                            <?php
                            $count2 = count($opciones[$i]["datos"]);
                            ?>
                            <ul class="nav nav-second-level collapse">
                                <?php for ($j = 0; $j < $count2; $j++) { ?> 
                                    <li class="active"> <!-- ojo -->
                                        <!--                            <li><a class="active" href="#">Paciente Nuevo</a></li>-->
                                        <a href="<?php echo URL_MAIN . $opciones[$i]["datos"][$j]["url"]; ?>">
                                            <?php echo $opciones[$i]["datos"][$j]["sobrenombre"]; ?>
                                        </a>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                    <!--end here-->
                </ul>
            </div>
        </nav>
        <!--END MENU-->
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input disabled="disabled" type="text" placeholder="<?php echo $informacion[0]['cEmpNombre'] ?>" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Te encuentras aquí:
                                <strong><?php
                                    $modul = $this->uri->segment(1);
                                    echo ucwords(strtolower(isset($modul) ? $modul : "-" ));
                                    ?></strong>
                            </span>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>usuarios/logout">
                                <i class="fa fa-sign-out"></i> Salir
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><i><strong><?php
                                    $modul = $this->uri->segment(1);
                                    echo ucwords(strtolower(isset($modul) ? $modul : "-" ));
                                    ?></strong></i></h2>
                    <!--                <ol class="breadcrumb">
                                        </ol>-->
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">