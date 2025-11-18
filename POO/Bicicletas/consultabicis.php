<?php
define ('FICHERO_BICIS', 'bicis.csv');

// Cargo las bicicletas desde el fichero
function cargaBicis() {
    $fich = @fopen(FICHERO_BICIS, 'r');
    if ($fich==false){
        die ("Error al abrir el fichero de bicicletas");
    }
    $tabla = [];
    while( $datosbici= fgetcsv($fich)){
        $bici = new BiciElectrica($datosbici[0], $datosbici[1], $datosbici[2], $datosbici[3], $datosbici[4]);
        $tabla[] = $bici;
    }
    
    return $tabla;
}

function mostrarTablaBicis($tabla) :string{
    $cadena="<table><tr><th>ID</th><th>Coordenada X</th><th>Coordenada Y</th><th>Batería</th><th>Operativa</th></tr>";
    foreach ($tabla as $bici){   
        if ($bici -> operativa==1){
        $cadena.="<tr><td>".$bici -> id ."</td><td>".$bici -> coordx ."</td><td>".$bici -> coordy ."</td><td>".$bici -> bateria ."</td><td>".$bici -> operativa ."</td></tr>";
        }
    }
    $cadena.="</table>";
    return $cadena;
}
function biciMasCercana ($tabla, $x, $y):object{
    $bicimin = null;
    $distanciamin = PHP_INT_MAX;
    foreach ($tabla as $bici){
        if ($bici -> operativa == 1){
        $distancia=$bici -> distancia();
        }
        if ($distancia() < $distanciamin){
            $bicimin = $bici;
            $distanciamin = $distancia();
        }
    }

    
    return $bicimin;
}

// Programa principal
$tabla = cargabicis();
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
table, th, td {
border: 1px solid black;
}
</style>

</head>

<body>
<h1> Listado de bicicletas operativas </h1>
<?= mostrartablabicis($tabla); ?>
<?php if (isset($biciRecomendada)) : ?>
<h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
<button onclick="history.back()"> Volver </button>
<?php else : ?>
<h2> Indicar su ubicación: <h2>
<form>
Coordenada X: <input type="number" name="coordx"><br>
Coordenada Y: <input type="number" name="coordy"><br>
<input type="submit" value=" Consultar ">
</form>
<?php endif ?>
</body>

</html>