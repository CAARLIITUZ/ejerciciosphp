<?php

// DATOS DE PRUEBA: un array con precios de ejemplo
$precios = [250, 10, 50, 100, 50, 25, 5, 200, 10, 300, 50];

// Definimos las categorías según rango de precio
// Barato: hasta 20 incluido
// Medio: hasta 100 incluido
// Caro: más de 100
$categorias = ['Barato','Medio','Caro'];

// Llamamos a la función agruparPorCategoria usando el array de prueba
$res1 = agruparPorCategoria($precios, $categorias);

// Convertimos el array resultante en texto legible para mostrarlo
$msg1 = print_r($res1,true);

// Generamos un array de precios aleatorios entre 1 y 200, con 20 elementos
$preciosRandom = generarDatos(1, 200, 20);

// Agrupamos estos precios aleatorios por categoría
$res2 = agruparPorCategoria($preciosRandom, $categorias);

// Convertimos el resultado en texto para mostrarlo en pantalla
$msg2 = print_r($res2,true);

/**
 * Agrupa los precios según categoría: Barato, Medio o Caro
 * @param array $precios Array con precios numéricos
 * @param array $categorias Array con los nombres de las categorías
 * @return array Array multidimensional con precios agrupados por categoría
 */
function agruparPorCategoria($precios, $categorias): array {

    // Array donde se guardará el resultado
    $resultado = [];

    // Ordena los precios de menor a mayor
    sort($precios);

    // Recorre cada precio
    foreach($precios as $valor) {

        // Si el precio es menor o igual a 20 → Barato
        if ($valor <= 20) {
            $resultado[$categorias[0]][] = $valor;

        // Si el precio es menor o igual a 100 → Medio
        } else if ($valor <= 100) {
            $resultado[$categorias[1]][] = $valor;

        // Si el precio es mayor a 100 → Caro
        } else {
            $resultado[$categorias[2]][] = $valor;
        }
    }

    // Devuelve el array con los precios agrupados
    return $resultado;
}

/**
 * Genera un array de números aleatorios
 * @param int $min Valor mínimo
 * @param int $max Valor máximo
 * @param int $nunelementos Número de elementos a generar
 * @return array Array con números aleatorios
 */
function generarDatos($min, $max, $nunelementos): array {

    // Array donde se guardarán los números
    $resultado = [];

    // Recorre desde 1 hasta nunelementos-1
    for ($i = 1; $i < $nunelementos; $i++) {

        // Genera un número aleatorio entre min y max y lo añade al array
        $resultado[] = random_int($min, $max);
    }

    // Devuelve el array generado
    return $resultado;
}

?>

<!DOCTYPE html>
<!-- Documento HTML5 -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Codificación UTF-8 -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hace que sea responsive en móviles -->

    <title>Ejercicios de Array</title>
</head>
<body>

    <!-- Mostramos el primer resultado en formato legible -->
    <pre>
     <?= $msg1 ?>
    </pre><br>

    <!-- Mostramos el segundo resultado (aleatorio) en formato legible -->
    <pre>
     <?= $msg2 ?>
    </pre><br>

</body>
</html>
