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
    header {
        display: flex;
        flex-direction: row;
        justify-content: center;
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
    }
    table {
        width: 50%;
        border-collapse: collapse;
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
        flex-direction: row;
        justify-content: flex-start; /* Alineación a la izquierda */
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
                <input type="text" name="numero1" id="numero1">
                <select name="operacion" id="operacion">
                    <option value="X">X</option>
                    <option value="/">/</option>
                    <option value="+">+</option>
                    <option value="-">-</option>
                </select>
                <input type="text" name="numero2" id="numero2">
                <input type="submit" value="=">
            </label>
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            if (!empty($_GET["numero1"])){
                $numero1=$_GET["numero1"];
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
                        if($terminado[$i]!="B" && $terminado[$i]!="q"){
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
        <label for="cinta">
            Cinta<input type="text" name="cinta" value="<?php
                if (isset($valor)) {
                    echo $valor;
                }
            ?>">
            <input type="submit" name="boton" value="Siguiente" <?php if (empty($_SESSION["resultado"])) echo 'disabled'; ?>>
            <input type="submit" name="boton" value="Finalizar" <?php if (!empty($_SESSION["resultado"])) echo 'disabled'; ?>>
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
    
    </main>
    <footer></footer>
</body>
</html>