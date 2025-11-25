<?php
// Incluye la definición de la clase BiciElectrica
require_once("BiciElectrica.php");

// ---------------------------------------------------------
// Leer el fichero csv y devuelve una tabla (array) de bicis
// ---------------------------------------------------------
function cargarbicis(): array
{
    // Abre el fichero CSV en modo lectura
    $fich = @fopen("Bicis.csv", "r");
    if ($fich == false) {
        die("Error al abrir el fichero"); // Si falla, se detiene el programa
    }

    $tabla = []; // Array donde se guardarán los objetos BiciElectrica

    // Lee línea a línea el archivo CSV
    while ($valor = fgetcsv($fich)) {

        // Extrae los valores del CSV en variables individuales
        list($id, $cx, $cy, $bat, $op) = $valor;

        // Crea un nuevo objeto BiciElectrica con los datos leídos
        $bici = new BiciElectrica($id, $cx, $cy, $bat, $op);

        // Añade la bicicleta al array
        $tabla[] = $bici;
    }

    return $tabla; // Devuelve el array completo de bicicletas
}

// ---------------------------------------------------------------------
// Devuelve una cadena HTML con una tabla que muestra solo bicis operativas
// ---------------------------------------------------------------------
function mostrartablabicis($tabla): string
{
    // Encabezado de la tabla HTML
    $cadena = "<table><tr><th>Id</th><th>Coord X</th><th>Cood Y</th><th>Bateria</th></tr>";

    // Recorre todas las bicicletas
    foreach ($tabla as $bici) {

        // Solo muestra aquellas que están operativas (operativa == 1)
        if ($bici->operativa == 1) {
            $cadena .= "<tr>";
            $cadena .= "<td>" . $bici->id . "</td>";        // ID
            $cadena .= "<td>" . $bici->coordx . "</td>";    // Coordenada X
            $cadena .= "<td>" . $bici->coordy . "</td>";    // Coordenada Y
            $cadena .= "<td>" . $bici->bateria . "%</td>";  // Batería
            $cadena .= "</tr>";
        }
    }

    $cadena .="</table>"; // Cierra la tabla

    return $cadena; // Devuelve el HTML generado
}


/**
 * -------------------------------------------------------------
 * Devuelve la bici operativa más cercana a las coordenadas del usuario
 * -------------------------------------------------------------
 * @param $tabla - Array de bicicletas cargadas
 * @param $x - Coordenada X del usuario
 * @param $y - Coordenada Y del usuario
 * @return bicicleta más cercana o null si no hay bicis operativas
 */
function bicimascercana($tabla, $x, $y)
{
    $bicicerca = null;             // Bicicleta más cercana hallada
    $distanciamin = PHP_INT_MAX;   // Distancia mínima (se inicia muy alta)

    // Recorre todas las bicis
    foreach ($tabla as $bici) {

        // Solo considera bicis operativas
        if ($bici->operativa == 1) {

            // Calcula la distancia entre la bici y las coordenadas del usuario
            $longitud =  $bici->distancia($x, $y);

            // Si la distancia es menor que la mínima registrada, se actualiza
            if ($longitud < $distanciamin) {
                $bicicerca = $bici;
                $distanciamin = $longitud;
            }
        }
    }

    return $bicicerca; // Devuelve la bicicleta más cercana o null
}
