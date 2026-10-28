<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    /*
     * EJERCICIO 03: Pirámide de asteriscos
     * Genera un número aleatorio entre 1 y 9 y dibuja una pirámide
     * con ese número de filas. Cada fila tiene espacios a la izquierda
     * (para centrar) y un número impar de asteriscos (1, 3, 5, 7...).
     */

    $numero = random_int(1, 9);       // Número de filas de la pirámide (aleatorio entre 1 y 9)
    $contEspacios = $numero - 1;      // Espacios de la primera fila: la última fila tendrá 0
    $contAsteriscos = 1;              // La primera fila (la punta) tiene 1 asterisco
?>
    <code> <!-- Fuente monoespaciada: espacio y asterisco miden igual, así la pirámide se alinea -->
<?php
    // Bucle exterior: se repite una vez por cada FILA de la pirámide
    for ($i = 1; $i <= $numero; $i++) {

        // Bucle 1: pinta los espacios a la izquierda de la fila
        for ($j = 1; $j <= $contEspacios; $j++) {
            echo "&nbsp;";            // Espacio en HTML (los espacios normales se juntarían en uno)
        }

        // Bucle 2: pinta los asteriscos de la fila
        for ($k = 1; $k <= $contAsteriscos; $k++) {
            echo "*";
        }

        $contAsteriscos += 2;         // La siguiente fila tiene 2 asteriscos más (uno por cada lado)
        $contEspacios--;              // y 1 espacio menos (la pirámide se ensancha hacia la izquierda)
        echo "<br/>";                 // Salto de línea: pasamos a la siguiente fila
    }
?>
    </code>

    <hr>
    <?php show_source(__FILE__); ?>  <!-- Muestra el código fuente de este mismo archivo -->
    <hr>
</body>
</html>