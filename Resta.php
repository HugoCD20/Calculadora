<?php
    $Funciones=[
        [[0,"0","0","R",0],[0,"1","1","R",1]],//estado_actual, entrada, remplazo, movimiento, estado al que se dirige
        [[1,"0","1","L",2],[1,"1","1","R",1],[1,"B","B","L",4]],
        [[2,"0","0","L",2],[2,"1","1","L",2],[2,"Z","Z","L",2],[2,"B","B","R",3]],
        [[3,"0","B","R",0],[3,"1","Z","R",0],[3,"Z","Z","R",3]],
        [[4,"0","0","R",5],[4,"1","B","L",4],[4,"Z","Z","R",5]],
    ];
    $bandera=TRUE;
    $cinta=[];
    $estado_control=0;
    $estado=0;
    for ($i = 0; $i < strlen($cadena); $i++) {
        $cinta[] = $cadena[$i];
    }
    while($bandera){
        $coincidencia=NULL;
        if($estado_control<0){
            $aux="B";
        }else{
            if($estado_control>=count($cinta)){
                $aux="B";
            }else{
                $aux=$cinta[$estado_control];
            }
        }
        if ($estado!=5){
            foreach($Funciones[$estado] as $i){
                if($aux == $i[1]){
                    $coincidencia=$i;
                }
            }
        }else{
            $bandera=FALSE;
        }
        $resultado[]=[$estado_control,$cinta,$coincidencia];
        if($coincidencia){
           if($estado_control>=0 and $estado_control<count($cinta)){
                $cinta[$estado_control]=$coincidencia[2];
           } 
           $estado=$coincidencia[4];
           if($coincidencia[3]=="L"){
                $estado_control -=1;
           }else{
                $estado_control +=1;
           }
        }else{
            $bandera=FALSE;
        }
    }
    $_SESSION["resultado"]=$resultado;


?>