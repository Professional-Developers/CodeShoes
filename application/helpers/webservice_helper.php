<?php 
function print_p($expression){
	print("<pre>".print_r($expression,true)."</pre>");
}
function search_in_array($needle ,$haystack,$pointer){
	// @haystack(pajar) => donde se buscara 
	// @needle(aguja)  => lo que necesitas encontrar
	// @pointer => id donde sacaras los datos
	if ($haystack) {
		foreach ($haystack as $key => $row) {
			if ($row[$pointer]==$needle ) {
				return true;
			}
		}
	}
}

function retornaedad($fechaNacimiento) {
    $fecha1 = explode("-", $fechaNacimiento);
    $fecha2 = explode("-", date("Y-m-d"));
    
    //$NuevoAnio=0;
    //$NuevoMes=0;
    $anos = $fecha2[0] - $fecha1[0];
    $meses = $fecha2[1] - $fecha1[1];
    $dias = $fecha2[2] - $fecha1[2];
    $NuevoAnio=$anos;
    $NuevoMes=$meses;
    //return $meses;//
    //return $fecha2[1];//05
    //exit;
    
    if ($meses == 0) {
        if ($dias == 0) {
            $NuevoAnio = $anos;
        }
        /*if((int)$fecha2[2]-1 > (int)$fecha1[2]){
            $NuevoAnio = $anos;
        }else if((int)$fecha2[2]-1 < (int)$fecha1[2]){   
            $NuevoMes=11;
            $NuevoAnio = $anos - 1;
        }*/
        if($fecha2[2]-1 > $fecha1[2]){
            $NuevoAnio = $anos;
        }else if($fecha2[2]-1 < $fecha1[2]){   
            $NuevoMes=11;
            $NuevoAnio = $anos - 1;
        }
        
    } else {
        if ($fecha2[1] - $fecha1[1] > 0) {
            if ($fecha1[2] > $fecha2[2]) {
                $NuevoMes = $meses - 1;
                $NuevoDia = (30 - $fecha1[2]) + $fecha2[2];
                //echo "Anos: " . $anos . " Meses: " . $NuevoMes . " Dias: " . $NuevoDia;
            } else {
                $NuevoAnio=$NuevoAnio;
                $NuevoMes=$NuevoMes;
                //echo "Anos: " . $anos . " Meses: " . $meses . " Dias: " . $dias;
            }
        } else {
            $NuevoAnio = $anos - 1;
            $NuevoMes = 12 + $meses;
            //echo "Anos: " . $NuevoAnios . " Meses: " . $NuevoMes . " Dias: " . $fecha2[2];
        }
    }
    //return $meses;
    $edad[]=$NuevoAnio;
    $edad[]=$NuevoMes;
    /*$edad[]=(int)$fecha2[2];
    $edad[]=(int)$fecha1[2];*/
    /*$edad[]=(int)$fecha2[0];
    $edad[]=(int)$fecha1[0];*/
    /*$edad[]=$fecha2[0];
    $edad[]=$fecha1[0];*/
    return $edad;
    //echo $NuevoAnio;
    //echo $fechaNacimiento;
}

function retornamesactual($mes){
	if($mes==1){
		return "Enero";
	}else if($mes==2){
		return "Febrero";
	}else if($mes==3){
		return "Marzo";
	}else if($mes==4){
		return "Abril";
	}else if($mes==5){
		return "Mayo";
	}else if($mes==6){
		return "Junio";
	}else if($mes==7){
		return "Julio";
	}else if($mes==8){
		return "Agosto";
	}else if($mes==9){
		return "Setiembre";
	}else if($mes==10){
		return "Octubre";
	}else if($mes==11){
		return "Noviembre";
	}else if($mes==12){
		return "Diciembre";
	}else{
		return "";
	}
}
?>