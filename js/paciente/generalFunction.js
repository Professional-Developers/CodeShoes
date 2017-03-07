
function showMessageWGD(message)
{
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "0",
        "hideDuration": "0",
        "timeOut": "1800",
        "extendedTimeOut": "900",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    
    return toastr.success(message,".:WebGestionDental:.");
    
}

/*Function*/
function ReturnFechaYYMMDD(fecha, tipo)
{
    var horaFecha = '';

    if (tipo == '1')
        horaFecha = ' 00:00:00';
    else if (tipo == '2')
        horaFecha = ' 12:59:59';

    var yyyy = fecha.getFullYear().toString();
    var mm = (fecha.getMonth() + 1).toString();
    var dd = fecha.getDate().toString();
    return yyyy + '/' + (mm[1] ? mm : "0" + mm[0]) + '/' + (dd[1] ? dd : "0" + dd[0]) + horaFecha;
}
;
/*Function*/
function formattedDate(date, tipo) {
   
    var elem = '';
    var year = '';
    var month = '';
    var day = '';
   
    if (tipo == '0')
    {
        elem = date.split('-');
        year = elem[0];
        month = elem[1];
        day = elem[2];
        
        return [day, month, year].join('/');
    }
    else if (tipo == '1')
    {
        elem = date.split('/');
        day = elem[0];
        month = elem[1];
        year = elem[2];
        
        return [year, month, day].join('-');
    }
        
}
;