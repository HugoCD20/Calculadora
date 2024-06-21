<?php
    $Funciones=[
        [[0,"0","B","R",1],[0,"1","B","R",3]],//estado_actual, entrada, remplazo, movimiento, estado al que se dirige
        [[1,"0","0","R",1],[1,"1","1","R",1],[1,"B","0","L",2]],
        [[2,"0","0","L",2],[2,"1","1","L",2],[2,"B","B","R",0]],
        [[3,"0","B","R",4],[3,"1","B","R",6]],
        [[4,"0","0","R",4],[4,"1","1","R",4],[4,"B","0","L",5]],
        [[5,"0","0","L",5],[5,"1","1","L",5],[5,"B","B","R",3]],
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
        if ($estado!=6){
            foreach($Funciones[$estado] as $i){
                if($aux == $i[1]){
                    $coincidencia=$i;
                }
            }
        }else{
            $bandera=FALSE;
        }
        if($coincidencia){
           if($estado_control>=0){
                if($estado_control>count($cinta)){
                    $cinta[]=$coincidencia[2];
                }
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
    echo json_encode($cinta);


?>