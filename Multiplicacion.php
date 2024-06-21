<?php
    $Funciones=[
        [[0,"0","B","R",1]],//estado_actual, entrada, remplazo, movimiento, estado al que se dirige
        [[1,"0","0","R",1],[1,"1","1","R",2]],
        [[2,"0","X","R",3],[2,"1","1","L",5]],
        [[3,"0","0","R",3],[3,"1","1","R",3],[3,"B","0","L",4]],//estas son las funciones de transicion
        [[4,"0","0","L",4],[4,"1","1","L",4],[4,"X","X","R",2]],
        [[5,"X","0","L",5],[5,"1","1","R",6]],
        [[6,"0","0","L",7]],        
        [[7,"1","1","L",8]],        
        [[8,"0","0","L",9],[8,"B","B","R",10]],
        [[9,"0","0","L",9],[9,"B","B","R",0]],
        [[10,"1","B","R",11]],        
        [[11,"0","B","R",11],[11,"1","B","R",12]],
    ];
    $bandera=TRUE;//esta es la bandera que se usa para iterar la maquina de turing
    $cinta=[];//aqui se almacena la cinta
    $resultado=[];//aqui se almacena toda la informacion de la maquina de turing
    $estado_control=0;//estado de control
    $estado=0;//y el estado en el que se encuentra
    for ($i = 0; $i < strlen($cadena); $i++) {//se obtiene la cadena y se inserta en la cinta
        $cinta[] = $cadena[$i];
    }
    while($bandera){//se inicia la maquina de turing
        $coincidencia=NULL;//se inicializa la variable de coincidencias
        if($estado_control<0){//verifica que si el estado de control es menor a cero y se asigna
            $aux="B";//un espacion en blanco para la comparacion
        }else{
            if($estado_control>=count($cinta)){//verifica si el estado de control es mayor o igual al numero dela cinta
                $aux="B";//y asigna un espacio vacio al final
            }else{
                $aux=$cinta[$estado_control];//y aqui solo le asigna el valor del estado de control al auxiliar
            }
        }
        if ($estado!=12){//este de aqui verifica si ya entro al estado de aceptacion y termina el proceso
            foreach($Funciones[$estado] as $i){//busca que coincida una funcion de transicion
                if($aux == $i[1]){
                    $coincidencia=$i;
                }
            }
        }else{
            $bandera=FALSE;//detiene la maquina de turing
        }
        $resultado[]=[$estado_control,$cinta,$coincidencia];//guarda el historial de accion de la maquina de turing
        if($coincidencia){//verifica si coincidio una funcion de trancision
           if($estado_control>=0){//verifica que el estado de conrol sea mayor a 0
                if($estado_control>count($cinta)){//veifica que el estado de control sea mauor a el tamaño de la cinta
                    $cinta[]=$coincidencia[2];//agrega un valor en lugar del espacio vacio
                }
                $cinta[$estado_control]=$coincidencia[2];//hace lo mismo pero en un lugar en especifico 
           } 
           $estado=$coincidencia[4];//actualiza al estado al que se mueve
           if($coincidencia[3]=="L"){//realiza el movimiento ya sea a la derecha o izquierda
                $estado_control -=1;
           }else{
                $estado_control +=1;
           }
        }else{
            $bandera=FALSE;
        }
    }
    $_SESSION["resultado"]=$resultado;//y guarda en una cooke los resultado s de la maquina de turing


?>