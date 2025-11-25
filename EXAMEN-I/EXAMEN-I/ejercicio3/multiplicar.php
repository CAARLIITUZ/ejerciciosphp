<?php
// ------------------------------------------------------------
// Programa que genera las tablas de multiplicar del 1 al 10
// ------------------------------------------------------------

// Array con los números del 1 al 10 y su nombre en español
// Nota: la clave 1 se asigna a 'uno', las demás claves se asignan automáticamente 2,3,...,10
$numeros = [ 1 => 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez'];

// Array donde se guardarán las tablas de multiplicar
$tmulti = [];

// Recorremos cada número y su nombre
foreach ( $numeros as $pos => $nombre){

    // Array temporal para almacenar los resultados de la tabla de cada número
    $tabladevalores = [];

    // Calcula las multiplicaciones de 1 a 10
    for($i = 1; $i <= 10; $i++){
        $tabladevalores[$i] =  $pos * $i; // $pos es el número (1,2,...,10)
    }

    // Guardamos la tabla en el array final, con clave el nombre del número
    $tmulti[$nombre] = $tabladevalores;
}

// Mostramos el resultado de todas las tablas
echo "<pre> <code>";
var_dump($tmulti); // Imprime la estructura completa de arrays
echo "<pre> <code>";
?>
