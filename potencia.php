<?php
    $Funciones=[
        [[0,"0","B","R",1]],
        [[1,"0","0","R",1],[1,"1","1","R",2]],
        [[2,"0","X","R",3],[2,"1","1","L",5]],//funciones de transicion de la potencia
        [[3,"0","0","R",3],[3,"1","1","R",3],[3,"X","X","R",3],[3,"B","0","L",4]],
        [[4,"0","0","L",4],[4,"1","1","L",22]],
        [[5,"1","1","R",6],[5,"X","0","L",5]],
        [[6,"0","0","L",7]],
        [[7,"1","1","L",8]],
        [[8,"0","0","L",9],[8,"B","B","R",10]],
        [[9,"0","0","L",9],[9,"B","B","R",0]],
        [[10,"1","1","R",11]],
        [[11,"0","0","R",11],[11,"1","1","R",12]],
        [[12,"0","X","R",21],[12,"X","X","R",12]],
        [[13,"0","0","R",13],[13,"1","1","R",13],[13,"B","B","L",14]],
        [[14,"0","B","L",15],[14,"1","1","L",17]],
        [[15,"0","0","L",15],[15,"1","1","L",15],[15,"X","X","L",15],[15,"B","0","R",16]],
        [[16,"0","0","R",16],[16,"1","1","R",16],[16,"X","X","R",16],[16,"B","B","L",14]],
        [[17,"0","0","L",17],[17,"1","1","L",17],[17,"X","X","L",17],[17,"B","B","R",0]],
        [[18,"0","0","L",18],[18,"1","1","L",18],[18,"X","X","L",18],[18,"B","B","R",19]],
        [[19,"0","B","R",19],[19,"1","B","R",19],[19,"X","B","R",20]],
        [[20,"1","B","R",24],[20,"X","B","R",20]],
        [[21,"0","0","R",13],[21,"1","1","L",18]],
        [[22,"0","0","L",22],[22,"1","1","L",23],[22,"X","X","L",22]],
        [[23,"0","0","L",23],[23,"1","1","L",23],[23,"X","X","R",2]],
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
        if ($estado!=24){//este de aqui verifica si ya entro al estado de aceptacion y termina el proceso
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
                    if($coincidencia[1]!="B" && $coincidencia[0]!=17){
                        $cinta[]=$coincidencia[2];//agrega un valor en lugar del espacio vacio
                    }
                }else{
                    $cinta[$estado_control]=$coincidencia[2];//hace lo mismo pero en un lugar en especifico
                    
                }
           }else{
                if($coincidencia[2]!="B"){//esta parte evita que la cinta remplace un espacio en blanco cuando no es necesario
                    array_unshift($cinta,$coincidencia[2]);//esta funcion agrega un valor al inicio del arreglo y recorre los demás
                }
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