<?php

function suma (int $num1, int $num2):int{
    $resu = $num1 +$num2;
    return $resu;
}

function sumapos(array $t):int{

    for ($i=0; $i<count($t); $i++){
        if ($t[$i]>0){
            $resu += $t [$i];
        }
    }
    return $resu;
}

function sumaposceros(array $t):int{

    for ($i=0; $i<count($t); $i++){
        if ($t[$i]>0){
            $resu += $t [$i];
        }else {
            $t[$i]=0;
        }
    }
    return $resu;
}


$valores = [3,5,-5,-60,6,0,-1,8];
$valores2 = [3,5,-5,-60,6,0,-1,8,32,6];


echo"10 + 20= " . suma(10,20) . "\n";

$cosa=100;

$valor = suma($cosa,2);

echo "La suma de " . $cosa . " +2 =" . $valor;

echo "La suma de positivos es: " . sumaposceros($valores) . "\n";

print_r($valores);