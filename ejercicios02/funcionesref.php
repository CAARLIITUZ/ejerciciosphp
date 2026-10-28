<?php
    /*
     * FUNCIONESREF.PHP
     * Funciones de operaciones matemáticas.
     * Cada función recibe:
     *  - $numero1 y $numero2 por VALOR (solo se leen)
     *  - $resultado por REFERENCIA (&): la función guarda ahí el resultado
     *    y el cambio se ve fuera. Por eso no hay return.
     */

    function calSuma(int $numero1, int $numero2, &$resultado) {
        $resultado = $numero1 + $numero2;
    }

    function calResta(int $numero1, int $numero2, &$resultado) {
        $resultado = $numero1 - $numero2;
    }

    function calProducto(int $numero1, int $numero2, &$resultado) {
        $resultado = $numero1 * $numero2;
    }

    function calDivision(int $numero1, int $numero2, &$resultado) {
        $resultado = $numero1 / $numero2;   // Puede dar decimales (5/2 = 2.5)
    }

    function calModulo(int $numero1, int $numero2, &$resultado) {
        $resultado = $numero1 % $numero2;   // Resto de la división entera
    }

    // Potencia calculada con un bucle for: multiplica la base por sí misma
    // tantas veces como indique el exponente
    function calPotencia(int $base, int $exponente, &$resultado) {
        $resultado = 1;                     // Empieza en 1 (no altera la multiplicación)
        for ($i = 1; $i <= $exponente; $i++) {
            $resultado = $resultado * $base;
        }
        // Si el exponente es 0, el bucle no se ejecuta y queda 1 (correcto: x⁰ = 1)
    }
?>