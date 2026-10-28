<?php
    /*
     * EJERCICIO 03: Operaciones con paso por referencia
     * Genera dos números aleatorios entre 1 y 10 y muestra su suma, resta,
     * producto, división, módulo y potencia usando las funciones de
     * funcionesref.php, que guardan el resultado en su tercer parámetro.
     */

    include_once("funcionesref.php");   // Carga las funciones (si falla, solo muestra un aviso)

    $num1 = random_int(1, 10);
    $num2 = random_int(1, 10);

    // Llamamos a cada función. Tras cada llamada, la variable del
    // tercer parámetro ya contiene el resultado.
    calSuma($num1, $num2, $suma);
    calResta($num1, $num2, $resta);
    calProducto($num1, $num2, $producto);
    calDivision($num1, $num2, $division);
    calModulo($num1, $num2, $modulo);
    calPotencia($num1, $num2, $potencia);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Operaciones por referencia</title>
</head>

<body>
    <h1>Operaciones</h1>

    <p>1º Número : <?= $num1 ?></p>
    <p>2º Número : <?= $num2 ?></p>

    <p><?= $num1 ?> + <?= $num2 ?> = <?= $suma ?></p>
    <p><?= $num1 ?> - <?= $num2 ?> = <?= $resta ?></p>
    <p><?= $num1 ?> * <?= $num2 ?> = <?= $producto ?></p>
    <p><?= $num1 ?> / <?= $num2 ?> = <?= round($division, 2) ?></p>
    <p><?= $num1 ?> % <?= $num2 ?> = <?= $modulo ?></p>
    <p><?= $num1 ?> ** <?= $num2 ?> = <?= $potencia ?></p>

    <hr>
    <?php show_source(__FILE__); ?>
    <hr>
</body>

</html>