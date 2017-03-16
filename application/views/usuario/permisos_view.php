<link href="<?php echo URL_PLU; ?>tree/css/ui.dynatree.css" rel="stylesheet" type="text/css">
<script src="<?php echo URL_PLU; ?>tree/js/jquery.dynatree.js" type="text/javascript"></script>
<h3><?php 
    echo $rol;
    //print_p($permisos);exit;
?>
</h3>
<script>
var objPermisos = <?php echo json_encode($permisos) ?>;
var permisos=[];
$.each( objPermisos, function( key, value ) {
	permisos.push(value);
});
console.log(permisos);
$("#listPermisos").dynatree({
	checkbox: true,
	selectMode: 3,
	children: permisos
});

</script>

<input type="hidden" value="<?php echo $pid ?>" id="txtpid" >
<div id="listPermisos"></div>