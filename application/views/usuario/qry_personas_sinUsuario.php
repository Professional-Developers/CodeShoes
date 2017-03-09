<?php //var_dump($person); ?>
<script>
$(function(){
    $("#btnSelectPerson").unbind();
    $("#btnSelectPerson").bind({
        click:function(e){
            e.preventDefault();
            console.log($(this).attr('attr-ids'));
            console.log($(this).attr('attr-dns'));
            $("#txtUsuario").val( $(this).attr('attr-dns') );//dni
            $("#txt_nPerId").val($(this).attr('attr-ids'));//idPersona
            $("#txtUsuario").addClass('disabled');
            $("#infopersona").html('');
        }
    });
});
</script>
<?php if(is_array($person)){ ?>
<!--<div class="clear"></div>
<div class="row-fluid">
    <div class="span8">-->
        <div class="centerContent">
            <ul class="bigBtnIcon" style="text-align: left;">
                <li>
                    <a href="#" id="btnSelectPerson" attr-ids="<?php echo $person[0]['nPerId'] ?>" attr-dns="<?php echo $person[0]['cPerDni'] ?>" title="Seleccionar Persona" class="tipB estiloBoxUsuario">
                        <span class="icon icomoon-icon-users"></span>
                        <span class="txt todoMayuscula">
                            <?php echo $person[0]['cPerNombres'].' '.$person[0]['cPerApellidoPaterno'].' '.$person[0]['cPerApellidoMaterno'] ?>
                        </span>
                        <!-- <span class="notification">5</span> -->
                    </a>
                </li>
            </ul>   
        </div>
<!--</div>
</div>-->
<?php }else{?>
<!--<div class="row-fluid">
    <div class="span8">
        <div class="centerContent">
           <center>-->
                <span>No se encontraron registros ó la persona cuenta con Usuario</span>
<!--           </center>
        </div>
    </div>
</div>-->
<?php } ?>