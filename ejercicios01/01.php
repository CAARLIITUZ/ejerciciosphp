<!DOCTYPE html>
<?php 
    include "funciones.php"; //si no encuentra el archivo funciones.php salta un warning

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$num1 = random_int(1,10);
$num2 = random_int(1,10);

$resusuma=0;
sumar2($num1,$num2,$resusuma);

echo $num1.'+'.$num2. " = ". sumar($num1,$num2) . "<br>";
echo $num1.'-'.$num2. " = ". $num1-$num2 . "<br>";
echo $num1.'*'.$num2. " = ". $num1*$num2 . "<br>"; 
echo $num1.'/'.$num2. " = ". $num1/$num2 . "<br>";
echo $num1.'%'.$num2. " = ". $num1%$num2 . "<br>";
echo $num1.'**'.$num2. " = ". $num1**$num2 . "<br>";

?>

</body>
</html>