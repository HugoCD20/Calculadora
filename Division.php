<?php
    $Funciones=[
        [[0,"0","0","R",0],[0,"1","1","R",1]],//estado_actual, entrada, remplazo, movimiento, estado al que se dirige
        [[1,"0","X","L",2],[1,"1","1","R",3],[1,"X","X","R",1]],
        [[2,"0","0","L",2],[2,"1","1","L",2],[2,"X","X","L",2],[2,"B","B","R",6]],
        [[3,"0","0","R",3],[3,"B","0","L",5]],
        [[4,"0","0","R",0],[4,"1","B","R",7]],
        [[5,"0","0","L",5],[5,"1","1","L",5],[5,"X","0","L",5],[5,"B","B","R",4]],
        [[6,"0","B","R",0],[6,"1","B","R",8]],        
        [[7,"0","B","R",7],[7,"1","B","R",10]],
        [[8,"0","B","R",8],[8,"X","B","R",8],[8,"1","B","R",9]],
        [[9,"0","0","R",9],[9,"B","Y","L",10]],      
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
        if ($estado!=10){
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