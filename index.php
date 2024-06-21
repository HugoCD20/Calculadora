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
        }
        label{
            display: flex;
            flex-direction: row;
            justify-content: center;
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
    ?>
    </main>
    <footer></footer>
</body>
</html>