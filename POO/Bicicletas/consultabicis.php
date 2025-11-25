<?php
// Constante que indica el fichero donde están almacenadas las bicicletas.
define ('FICHERO_BICIS', 'bicis.csv');

// Función que carga las bicicletas desde el archivo CSV.
function cargaBicis() {
    // Intenta abrir el fichero en modo lectura.
    $fich = @fopen(FICHERO_BICIS, 'r');
    if ($fich==false){
        die ("Error al abrir el fichero de bicicletas"); // Finaliza si no se puede abrir.
    }

    $tabla = []; // Array donde se guardarán las bicicletas.

    // Lee el fichero línea a línea, interpretando cada línea como CSV.
    while( $datosbici= fgetcsv($fich)){
        // Crea un objeto BiciElectrica con los datos leídos.
        $bici = new BiciElectrica($datosbici[0], $datosbici[1], $datosbici[2], $datosbici[3], $datosbici[4]);
        $tabla[] = $bici; // Añade el objeto al array.
    }
    
    return $tabla; // Devuelve el array con todas las bicicletas cargadas.
}

// Función que genera una tabla HTML con las bicicletas operativas.
function mostrarTablaBicis($tabla) :string{
    // Cabecera de la tabla.
    $cadena="<table><tr><th>ID</th><th>Coordenada X</th><th>Coordenada Y</th><th>Batería</th><th>Operativa</th></tr>";

    // Recorre las bicicletas.
    foreach ($tabla as $bici){   
        // Solo muestra las bicicletas que están operativas.
        if ($bici -> operativa==1){
            // Añade una fila HTML por cada bicicleta operativa.
            $cadena.="<tr><td>".$bici -> id ."</td><td>".$bici -> coordx ."</td><td>".$bici -> coordy ."</td><td>".$bici -> bateria ."</td><td>".$bici -> operativa ."</td></tr>";
        }
    }

    $cadena.="</table>"; // Cierra la tabla.
    return $cadena; // Devuelve el HTML generado.
}

// Función que determina cuál es la bicicleta operativa más cercana a unas coordenadas.
function biciMasCercana ($tabla, $x, $y):object{
    $bicimin = null; // Bicicleta más cercana encontrada.
    $distanciamin = PHP_INT_MAX; // Distancia mínima encontrada (valor inicial muy grande).

    // Recorre todas las bicicletas.
    foreach ($tabla as $bici){
        // Solo considera bicicletas operativas.
        if ($bici -> operativa == 1){
            // Calcula la distancia desde la bici a la posición del usuario.
            $distancia=$bici -> distancia();
        }

        // Si la distancia es menor que la que teníamos, actualizamos la mínima.
        if ($distancia() < $distanciamin){
            $bicimin = $bici;
            $distanciamin = $distancia();
        }
    }

    return $bicimin; // Devuelve la bicicleta más cercana.
}

// ---------------------------
//       PROGRAMA PRINCIPAL
// ---------------------------

// Carga la tabla de bicicletas desde el fichero.
$tabla = cargabicis();

// Si el usuario ha introducido coordenadas por GET, busca la bici más cercana.
if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
    $biciRecomendada = bicimascercana($_GET['coordx'], $_GET['coordy'], $tabla);
}

?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>MOSTRAR BICIS OPERATIVAS</title>
<style>
/* Estilo básico para la tabla */
table, th, td {
border: 1px solid black;
}
</style>

</head>

<body>
<h1> Listado de bicicletas operativas </h1>

<!-- Muestra la tabla de bicis operativas -->
<?= mostrartablabicis($tabla); ?>

<?php if (isset($biciRecomendada)) : ?>
    <!-- Si se ha encontrado una bicicleta cercana, se muestra aquí -->
    <h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
    <button onclick="history.back()"> Volver </button>

<?php else : ?>
    <!-- Si no se han introducido coordenadas, se pide al usuario -->
    <h2> Indicar su ubicación: <h2>
    <form>
        Coordenada X: <input type="number" name="coordx"><br>
        Coordenada Y: <input type="number" name="coordy"><br>
        <input type="submit" value=" Consultar ">
    </form>
<?php endif ?>

</body>

</html>
