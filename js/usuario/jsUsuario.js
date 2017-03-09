$(function () {
    $("#listaPerUsers").bind({
        click: function () {
            loadGridView();
        }
    });
    $("#listaRol").bind({
        click: function () {
            loadGridRolesView();
        }
    });
    $("#btnchange").bind({
        click: function () {
            //alert("jaja");
            loadchangepass();
        }
    });
    
    $("#btnAsignar").bind({
        click:function(evt){
            evt.preventDefault();
            guardarPermisos();
        }
    });
    /*
    $("#btnAsignar").bind({
        click: function (evt) {
            evt.preventDefault();
            guardarPermisos();
        }
    });*/
    /*IMPORTANTISIMO PARA EL RESPONSIVE EN LAS TABLAS JQUERYDATATABLES DENTRO DE TABS DE BOOTSTRAP*/
    $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
        console.log('show tab');
        $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
    });

});

function loadchangepass() {
    msgLoadSave("#msgUpdClave", "#btnchange", "Subiendo Archivo");
    $.ajax({
        url: 'usuarios/updatePass',
        type: 'post',
        cache: false,
        data: {
            idUsu: $("#codUsuario").val(),
            clave: $("#txtClaveUpd").val(),
            rol: $("#cboTipoRolUpd option:selected").val()
        },
        success: function (data) {
            console.log(data);
            if (data == "1") {
                mensaje("En hora buena registro correcto", 'e');
                loadGridView();
                $("#codUsuario").val('');
                $("#txtClaveUpd").val('');
                msgLoadSaveRemove("#btnchange");
                $("#modalCambiaPass").modal("hide");
            } else {
                mensaje("Houston, Tenemos Problemas!!!!!", 'r');
            }
        },
        error: function (er) {
            console.log(er);
            mensaje("Houston, Tenemos Problemas!!!!!", 'r');
        }
    });
}

function guardarPermisos() {
    var rootNode = $("#listPermisos").dynatree("getRoot");
    console.log(rootNode.data.key);
    var selNodes = rootNode.tree.getSelectedNodes();
    var selKeys = $.map(selNodes, function (node1) {
        if (node1.parent.data.key != '_1') {
            return node1.data.key;
            // console.log("[" + node1.data.key + "]: '" + node1.data.title + "'");
        }
    });
    //console.log(selKeys);
    //Probando cuenta personal bitbucket
    $.ajax({
        url: 'usuario/setPermisosIns',
        type: 'POST',
        cache: false,
        data: {
            ids: selKeys,
            pid: $("#txtpid").val()
        },
        success: function (data) {
            if (data == "1") {
                $('#permisosModal').modal('hide');
                mensaje("Se han aplicado las condiciones de configuracion con exito.", 'e');
            } else {
                mensaje("Houston, tenemos un problema... por favor intentalo nuevamente", 'r');
            }
        },
        error: function (er) {
            console.log("error".er);
        }
    });
}
/*
function getAsignarPermisos(pid,rol) {
    //console.log(pid);
    alert("23123+rol")
    $.ajax({
        url: 'usuario/getPermisos',
        cache: false,
        type: 'POST',
        data: {
            pid: pid,
            rol:rol
        },
        success: function (data) {
            //$(".modal-body").html(data);
            $("#bodyPermisoUpd").html(data);
            $('#permisosModal').modal({
                show: true
            });
            $('.modalAmpliado').css('width', '60%');
            // $("#listaPermisos").html(data);
        },
        error: function (er) {
            console.log("error".er);
        }
    });
}*/
function loadGridRolesView() {
    $("#listaRoles").html("");
    //alert(223)
    $.ajax({
        type: "POST",
        url: "rol/qryRolUsu",
        cache: false,
        data: {
            tipo: 'CBO'
        },
        success: function (data) {
            console.log(data);
            $("#listaRoles").html(data);
        },
        error: function () {
            alert("error");
        }
    });
}
function loadGridView() {
     $("#listaPersonasUsuarios").html("");
    msgLoading("#listaPersonasUsuarios", "");
    $.ajax({
        type: "POST",
        url: "usuarios/qryPersonaUsu",
        cache: false,
        data: {
            tipo: 'LPU'
        },
        success: function (data) {
            $("#listaPersonasUsuarios").html(data);
        },
        error: function () {
            alert("error");
        }
    });
}


//ROL

function guardarPermisos(){
    var rootNode = $("#listPermisos").dynatree("getRoot");
    console.log(rootNode.data.key);
    var selNodes = rootNode.tree.getSelectedNodes();
    var selKeys = $.map(selNodes, function(node1){
        if(node1.parent.data.key != '_1'){
            return node1.data.key;
        // console.log("[" + node1.data.key + "]: '" + node1.data.title + "'");
        }
    });
    //console.log(selKeys);
    //Probando cuenta personal bitbucket
    $.ajax({
        //url:'usuario/setPermisosIns',
        url:'usuarios/setPermisosRolIns',
        type:'POST',
        cache:false,
        data:{
            ids:selKeys,
            pid:$("#txtpid").val()
        },
        success:function(data){
            if (data=="1") {
                //$('#permisosModal').modal('hide');
                $('#permisosRolModal').modal('hide');
                mensaje("Se han aplicado las condiciones de configuracion con exito.",'e');
            } else{
                mensaje("Houston, tenemos un problema... por favor intentalo nuevamente",'r');
            }
        },
        error:function(er){
            console.log("error".er);
        }
    });
}

function getAsignarPermisos(pid,rol){
    //console.log(pid);
    $.ajax({
        //url:'usuario/getPermisos',
        url:'rol/getPermisos',
        cache:false,
        type:'POST',
        data:{
            pid:pid,
            rol:rol
        },
        success:function(data){
            //$(".modal-body").html(data);
            //console.log(data)
            $("#bodyPermisoUpd").html(data);
            $('#permisosRolModal').modal({
                show: true
            });
            $('.modalAmpliado').css('width', '60%');
        // $("#listaPermisos").html(data);
        },
        error:function(er){
            console.log("error".er);
        }
    });
}