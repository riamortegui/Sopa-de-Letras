<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.php">
    <title>SOPA DE LETRAS</title>
</head>


<body>


<form method="POST" >

    <div>
        <input class="input" name="palabra" type="text" value="" required />
        <input class="buscar" type="submit" value="Buscar" />
        
    </div>
    
</form>

<?php

error_reporting(0);

$palabra = $_POST['palabra'];
 
/* Creando una matriz de 7x7. */
$matriz = array(
        array( "D", "E", "Y", "Q", "A", "U", "G" ),
        array( "X", "R", "G", "T", "U", "A", "V" ),
        array( "S", "C", "A", "S", "A", "B", "E" ),
        array( "X", "A", "J", "G", "U", "H", "V" ),
        array( "F", "M", "O", "R", "O", "L", "B" ),
        array( "G", "A", "H", "J", "E", "N", "E" ),
        );

 
/* Imprimiendo la matriz. */

echo "<table>";
    foreach($matriz as $fila){
        echo "<tr>";
            foreach($fila as $valor){
                echo "<td>$valor</td>";
            }
        echo "</tr>";
    }
echo "</table>";
 

$palabras =array();
$length = strlen($palabra)-1;
$match = false;



/* Un bucle for que está iterando a través de la matriz. */
for( $i=0, $filas=count($matriz); $i<$filas; $i++ ){
    for($j=0, $columnas=count($matriz[$i]); $j<$columnas; $j++){
 
    
  
 
       /* Comprobando si la palabra está en la matriz. */
        if($i-$length >= 0){
            $up  = "";
            for( $k=0; $k<=$length; $k++ ){
                $up  .= $matriz[$i-$k][$j];
            }
            if($up ==$palabra){
                $match = true;
                echo "Esta en la posicion [$i,$j] hacia arriba.<br />";
            }
        }


        if( $i-$length>=0 and $j+$length<$columnas ){
            $upRight  ="";
            for($k=0; $k<=$length; $k++){
                $upRight  .= $matriz[$i-$k][$j+$k];
            }
            if($upRight  == $palabra){
                $match = true;
                echo "Esta en la posicion [$i,$j] diagonal derecha hacia arriba.<br />";
            }
        }
 
       
        if( $j+$length<$columnas ){
            $right  ="";
            for($k=0; $k<=$length; $k++){
                $right  .= $matriz[$i][$j+$k];
            }
            if($right ==$palabra){
                $match = true;
                echo "Esta en la posicion [$i,$j] hacia la derecha.<br />";
            }
        }
 
        
        if( $i+$length<$filas and $j+$length<$columnas ){
            $rightDown  ="";
            for($k=0; $k<=$length; $k++){
                $rightDown  .= $matriz[$i+$k][$j+$k];
            }
            if($rightDown ==$palabra){
                $match = true;
                echo "Esta en la posicion [$i,$j] diagonal derecha hacia abajo.<br />";
            }
        }
 
       
        if( $i+$length<$filas ){
            $down  ="";
            for($k=0; $k<=$length; $k++){
                $down  .= $matriz[$i+$k][$j];
            }
            if($down ==$palabra){
                $match = true;
                echo "Esta en la posicion [$i,$j] hacia abajo.<br />";
            }
        }
 
        
        if( $i+$length<$filas and $j-$length>=0 ){
            $downLeft  ="";
            for($k=0; $k<=$length; $k++){
                $downLeft  .= $matriz[$i+$k][$j-$k];
            }
            if($downLeft ==$palabra){
                $match = true;
                echo "Esta en la posicion [$i,$j] diagonal izquierda hacia abajo.<br />";
            }
        }
 
       
        if( $j-$length>=0 ){
            $left  ="";
            for($k=0; $k<=$length; $k++){
                $left  .= $matriz[$i][$j-$k];
            }
            if($left ==$palabra){
                $match = true;
                echo "Esta en la posicion [$i,$j] hacia la izquierda.<br />";
            }
        }
 
        
       
        if( $j-$length>=0 and $i-$length>=0 ){
            $leftUp  ="";
            for($k=0; $k<=$length; $k++){
                $leftUp  .= $matriz[$i-$k][$j-$k];
            }
            if($leftUp==$palabra){
                $match = true;
                echo "Esta en la posicion [$i,$j] diagonal izquierda hacia arriba.<br />";
            }
        }
 
        
    }
}
 
/* Comprobando si la palabra no está en la matriz. */
if(!$match){
    echo "La palabra \"<b>$palabra</b>\" no existe.";
}
?>
    
</body>
</html>





