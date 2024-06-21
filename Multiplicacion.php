<?php
    $Funciones=[
        [[0,"0","B","R",1]],//estado_actual, entrada, remplazo, movimiento, estado al que se dirige
        [[1,"0","0","R",1],[1,"1","1","R",2]],
        [[2,"0","X","R",3],[2,"1","1","L",5]],
        [[3,"0","0","R",3],[3,"1","1","R",3],[3,"B","0","L",4]],
        [[4,"0","0","L",4],[4,"1","1","L",4],[4,"X","X","R",2]],
        [[5,"X","0","L",5],[5,"1","1","R",6]],
        [[6,"0","0","L",7]],        
        [[7,"1","1","L",8]],        
        [[8,"0","0","L",9],[8,"B","B","R",10]],
        [[9,"0","0","L",9],[9,"B","B","R",0]],
        [[10,"1","B","R",11]],        
        [[11,"0","B","R",11],[11,"1","B","R",12]],
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
        if ($estado!=12){
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