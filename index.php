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
        flex-direction: row;
        justify-content: center;
        background-color:gray;
        margin-bottom:20px;
        color:white;
    }
    .numero1,.numero2{
        width: 70px;
    }
    select{
        margin-left: 20px;
        margin-right: 20px;
    }
    .igual{
        margin-left: 10px;
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
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 20px;
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
            background-color: #f0f0f0; /* Opcional: para visualizar el contenedor */
            padding: 10px;
        }
        .contenedor2 img {
            max-width: 100%;
            max-height: 400px;
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
            <label for="numero1">            
                <input type="text" name="numero1" id="numero1" class="numero1">
                <select name="operacion" id="operacion">
                    <option value="X">X</option>
                    <option value="/">/</option>
                    <option value="+">+</option>
                    <option value="-">-</option>
                </select>
                <input type="text" name="numero2" id="numero2" class="numero2">
                <input type="submit" value="=" class="igual">
            </label>
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            if (!empty($_GET["numero1"])){
                $numero1=$_GET["numero1"];
                $_SESSION["imprime"]=null;
                $operacion=$_GET["operacion"];
                $numero2=$_GET["numero2"];
                $_SESSION["operacion"]=$numero1 ." ".$operacion. " ".$numero2;
                $_SESSION["tabla"]=$operacion;
                $numero1 = str_repeat("0", $numero1); 
                $numero2 = str_repeat("0", $numero2); 
                $cadena=$numero1 . "1". $numero2."1";
                if($operacion=="X"){                    
                    include("Multiplicacion.php");
                }elseif($operacion=="+"){
                    include("Suma.php");
                }elseif($operacion=="-"){
                    include("Resta.php");
                }elseif($operacion=="/"){
                    include("Division.php");
                }
                
            }            
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if(isset($_POST["boton"]) && $_POST["boton"]=="Siguiente"){
                if (isset($_SESSION["resultado"]) && !empty($_SESSION["resultado"])) {
                    $resultado = $_SESSION["resultado"];
                    if(isset($resultado[0][2][0])){
                        $maquina=(string)$resultado[0][2][0];
                    }
                    $cinta = $resultado[0][1];
                    $valor1="";
                    $valor="";
                    for($i = 0; $i < count($cinta); $i++) {
                        if($resultado[0][0]==$i){
                            $valor .= "q".$cinta[$i];
                        }else{
                            $valor .= $cinta[$i];
                        }
                    }
                    $final=TRUE;
                    for($i = 0; $i < strlen($valor); $i++) {
                        if($valor[$i]=="q"){
                            $final=FALSE;
                        }
                    }
                    if($final){
                        if ($resultado[0][0]<0){
                            $valor ="qB".$valor;
                        }else{
                            $valor .="qB";
                        }
                    }
                    unset($resultado[0]);
                    $resultado = array_values($resultado); // Reindexar el arreglo
                    $_SESSION["resultado"] = $resultado;
                }
            }else{
                if(isset($_POST["cinta"])){
                    $terminado=$_POST["cinta"];
                    $R_final="";
                    for($i = 0; $i < strlen($terminado); $i++) {
                        if($terminado[$i]!="B" && $terminado[$i]!="q" && $terminado[$i]!="Y"){
                            $R_final .=$terminado[$i];
                        }
                    }
                    if($R_final==""){
                        $_SESSION["imprime"]="0";
                    }else{
                        $_SESSION["imprime"]=strlen($R_final);
                    }
                }
            }
        }
    ?>
     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <?php
                if (!empty($_SESSION["resultado"])) {
                    echo "<h2>Presiona siguiente para continuar</h2>";
                }
                if(isset($_SESSION["operacion"])){
                    echo "<h3>Operacion: {$_SESSION['operacion']}</h3>";
                }
                ?>
        <label for="cinta" class="cinta">
            Cinta<input type="text" name="cinta" class="igual" value="<?php
                if (isset($valor)) {
                    echo $valor;
                }
            ?>">
            <input type="submit" class="igual" name="boton" value="Siguiente" <?php if (empty($_SESSION["resultado"])) echo 'disabled'; ?>>
            <input type="submit" class="igual" name="boton" value="Finalizar" <?php if (!empty($_SESSION["resultado"])) echo 'disabled'; ?>>
        </label>
    </form>
    <?php
        if (isset( $_SESSION["imprime"])){
            $imprime=$_SESSION["imprime"];
            echo "<h3>Resultado: {$imprime}</h3>";
        }
    ?>
    <div class="contenedor">
    <?php
        if(isset($valor)){
            if($_SESSION["tabla"]=="X"){
                include("tabla1.php");
            }elseif($_SESSION["tabla"]=="/"){
                include("tabla2.php");
            }elseif($_SESSION["tabla"]=="+"){
                include("tabla3.php");
            }elseif($_SESSION["tabla"]=="-"){
                include("tabla4.php");
            }
            
        }        
    ?>
    <div class="contenedor2">
        <?php   
            if(isset($valor)){
                $indice=$_SESSION["tabla"];
                if($indice=="/"){
                    $indice="1";
                }
                if(isset($maquina)){
                    echo '<img src="img' . $indice . '/q' . $maquina . '.png">';
                }else{
                    if($_SESSION["tabla"]=="X"){
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q12' . '.png">';
                    }elseif($_SESSION["tabla"]=="/"){
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q10' . '.png">';
                    }elseif($_SESSION["tabla"]=="+"){
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q6' . '.png">';
                    }elseif($_SESSION["tabla"]=="-"){
                        if (empty($_SESSION["resultado"])) echo '<img src="img' . $indice . '/q5' . '.png">';
                    }
                }
            }
        ?>
    </div>
    
    </main>
</body>
</html>