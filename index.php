<?php
header('Cache-Control: no-cache');
header('Content-Encoding: none');
ob_implicit_flush(true);
ob_end_flush();
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora</title>
    <style>
    header{
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 117px;
        background-color: #504e4e;
        margin-bottom: 20px;
        color: white;
        align-items: center;
    }
    .numero1,.numero2{
        width: 70px;
        border-style: unset;
    }
    select{
        margin-left: 20px;
        width: 54px;
        margin-right: 20px;
    }
    .igual,.cinta-2{
        margin-left: 10px;
        min-width: 46px;
    }
    .cinta{
        background-color: gray;
        color: white;
        width: 80%;
        height: 57px;
        align-items: center;
    }
    Strong{
        color: #4d1818;
    }
    .cinta-2{
        width: 50%;
        height: 25px;
        font-size: medium;
    }
    label, h2, h3 {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
        
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    table {
        width: 40%;
        border-collapse: collapse;
        margin-left:10%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    th, td {
        padding: 1px 2px;
        text-align: center;
        border: 1px solid #ccc;
    }
    th {
        background-color: #f2f2f2;
        color: #333;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #e9e9e9;
    }
    .contenedor {
        width: 100%;
        display: flex;
        margin-top:20px;
        flex-direction: row;
        justify-content: flex-start; /* Alineación a la izquierda */
    }
    .contenedor2 {
            width: 50%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0; 
            padding: 10px;
        }
        .contenedor2 img {
            max-width: 100%;
            max-height: 600px;
            height: auto;
            display: block;
        }
</style>

</head>
<body>
    <header>
        <h1>CALCULADORA</h1>
    </header>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
            <label for="numero1">   <!--menú de insertciones de datos-->         
                <input type="text" name="numero1" id="numero1" class="numero1">
                <select name="operacion" id="operacion">
                    <option value="X">X</option>
                    <option value="/">/</option>
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="^">^</option>
                </select>
                <input type="text" name="numero2" id="numero2" class="numero2">
                <input type="submit" value="=" class="igual">
            </label>
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] === "GET") {//este if verifica que se enviara una solicitud GET
            if (!empty($_GET["numero1"])){//este verifica que los datos no esten vacios
                $numero1=$_GET["numero1"];
                $_SESSION["imprime"]=null;
                $operacion=$_GET["operacion"];
                $numero2=$_GET["numero2"];
                $_SESSION["operacion"]=$numero1 ." ".$operacion. " ".$numero2;
                if($operacion=="^"){$numero2=$numero2 -1;}
                $_SESSION["tabla"]=$operacion;
                $numero1 = str_repeat("0", $numero1); //esta funcion sirve para que el numero decimal ingresado se represente con 0
                $numero2 = str_repeat("0", $numero2); 
                $cadena="";
                $continua=TRUE;
                if($operacion!="^"){
                    $cadena=$numero1 . "1". $numero2."1";//y se unen en una sola cadena
                }else{
                    if($numero2==null){
                        $continua=FALSE;
                    }else{
                        $cadena=$numero1 . "1". $numero1 ."1". $numero2."1";
                    }
                }
                $_SESSION["continua"] = $continua;
                if($continua){
                    if($operacion=="X"){//estas condicionales verifican que operacion se realizará              
                        include("Multiplicacion.php");//esta funcion incluye el documento Multiplicacion.php
                    }elseif($operacion=="+"){
                        include("Suma.php");
                    }elseif($operacion=="-"){
                        include("Resta.php");
                    }elseif($operacion=="/"){
                        include("Division.php");
                    }elseif($operacion=="^"){
                        include("potencia.php");
                    }
                }else{
                    $_SESSION["imprime"]=strlen($numero1);
                }
                
            }            
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {//este if verifica que se enviara una solicitud POST
            if(isset($_POST["boton"]) && $_POST["boton"]=="Siguiente"){//esta if verifica que boton se presiona
                if (isset($_SESSION["resultado"]) && !empty($_SESSION["resultado"])) {//este if verifica que los resultados no estén vacios
                    $resultado = $_SESSION["resultado"];
                    if(isset($resultado[0][2][0])){//ese de aqui le da valor a la variable $maquina que es con la que se hace la animacion
                        $maquina=(string)$resultado[0][2][0];
                    }
                    $cinta = $resultado[0][1];//este es el valor de la cinta
                    $valor1="";
                    $valor="";
                    for($i = 0; $i < count($cinta); $i++) {//de este lado se forma la cadena que se muestra en el input
                        if($resultado[0][0]==$i){//este inserta la q donde debe de ir
                            $valor .= "q".$cinta[$i];
                        }else{
                            $valor .= $cinta[$i];
                        }
                    }
                    $final=TRUE;
                    for($i = 0; $i < strlen($valor); $i++) {//ese de es en el caso de que la q deba de estar al final o al principio de la cinta
                        if($valor[$i]=="q"){
                            $final=FALSE;
                        }
                    }
                    if($final){
                        if ($resultado[0][0]<0){//esta de aqui ya actualiza la cadena en el caso de que la q vaya al final o al principio de la cinta
                            $valor ="qB".$valor;
                        }else{
                            $valor .="qB";
                        }
                    }
                    if(!empty($resultado[0][2])){
                        $_SESSION["seleccion"]=$resultado[0][2];
                    }else{
                        $_SESSION["seleccion"]=[24,"acabado"];
                    }
                    print_r($_SESSION["tabla"]);
                    unset($resultado[0]);
                    $resultado = array_values($resultado); // Reindexar el arreglo
                    $_SESSION["resultado"] = $resultado;
                }
            }else{//este codigo se ejecuta cuando se da al boton finalizar
                if(isset($_POST["cinta"])){//verifica que haya un valor
                    $terminado=$_POST["cinta"];
                    $R_final="";
                    for($i = 0; $i < strlen($terminado); $i++) {
                        if($terminado[$i]!="B" && $terminado[$i]!="q" && $terminado[$i]!="Y"){//quita los auxiliares que se utilizaron en la cinta
                            $R_final .=$terminado[$i];
                        }
                    }
                    if($R_final==""){//pone un valor al resultado en caso que no tenga uno se asigna sero
                        $_SESSION["imprime"]="0";
                    }else{
                        if($R_final[0]=="Z"){
                            $_SESSION["imprime"]=-strlen($R_final);
                        }else{
                            $_SESSION["imprime"]=strlen($R_final);
                        }
                        //en este caso es la cantidad de ceros que quedaron en la cadena
                    }
                }
            }
        }
    ?>
     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"><!--este formulario es para mover la cinta-->
            <?php
                if (!empty($_SESSION["resultado"])) {
                    echo "<h2>Presiona siguiente para continuar</h2>";//imprime una instrucción
                }
                if(isset($_SESSION["operacion"])){
                    echo "<h3>Operacion: {$_SESSION['operacion']}</h3>";//imprime la operación que se va a realizar
                }
                ?>
        <label for="cinta" class="cinta">
        Cinta-> estado actual:<?php if(isset($maquina)){echo "<strong>q".$maquina."</strong>";}?><input type="text" name="cinta" class="cinta-2" readonly value="<?php
                if (isset($valor)) {
                    echo $valor;
                }
            ?>">
            <input type="submit" class="igual" name="boton" value="Siguiente" <?php if (empty($_SESSION["resultado"]) || !$_SESSION["continua"]) {echo 'disabled'; }?>>
            <input type="submit" class="igual" name="boton" value="Finalizar" <?php if (!empty($_SESSION["resultado"]) || !$_SESSION["continua"]){ echo 'disabled';} ?>>
        </label>
    </form>
    <?php
        if (isset( $_SESSION["imprime"])){
            $imprime=$_SESSION["imprime"];
            echo "<h3>Resultado: {$imprime}</h3>";//aquí es donde se imprime el resultado
        }
    ?>
    <div class="contenedor">
    <?php
        if(isset($valor)){//aquí se imprime la tabla según la operación
            if($_SESSION["tabla"]=="X"){
                include("tabla1.php");
            }elseif($_SESSION["tabla"]=="/"){
                include("tabla2.php");
            }elseif($_SESSION["tabla"]=="+"){
                include("tabla3.php");
            }elseif($_SESSION["tabla"]=="-"){
                include("tabla4.php");
            }elseif($_SESSION["tabla"]=="^"){
                include("tabla5.php");
            }
            
        }        
    ?>
    <div class="contenedor2">
        <?php   
            if(isset($valor)){
                $indice=$_SESSION["tabla"];//aquí se imprime la máquina de Turing
                if($indice=="/"){
                    $indice="1";
                }
                if(isset($maquina)){
                    echo '<img src="img' . $indice . '/q' . $maquina . '.png">';
                }else{
                    if($_SESSION["tabla"]=="X"){//esto solo es para poner el último estado 
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q12' . '.png">';
                    }elseif($_SESSION["tabla"]=="/"){
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q10' . '.png">';
                    }elseif($_SESSION["tabla"]=="+"){
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q6' . '.png">';
                    }elseif($_SESSION["tabla"]=="-"){
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q5' . '.png">';
                    }elseif($_SESSION["tabla"]=="^"){
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q24' . '.png">';
                    }
                }
            }
        ?>
    </div>
    
    </main>
</body>
</html>
