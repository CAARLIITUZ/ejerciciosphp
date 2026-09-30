

<!DOCTYPE html>

<?php
$miArray = [];

for ($i=0; $i<20; $i++){
    $miArray[$i]= rand(1,10);
}

function mostrarMax(array $miArray){
    return $maximo= max($miArray);

}

function mostrarMin(array $miArray){
    return $minimo= min($miArray);
}

function mostrarMasVecesRepe(array $miArray){
    $contarVecesRepe = array_count_values($miArray);
    return $numMasRepe = array_search(max($contarVecesRepe),$contarVecesRepe);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div id="content">
    <table>
        <tr>
			<th style="color: blue;">Nºs RANDOM</th>
		</tr>
        <?php 
        foreach ($miArray as $num){
            echo "<tr><td>$num</td>";
        }
        ?> 
    </table>
    
    <p>Número máx: <?=  mostrarMax($miArray) ; ?></p>
    <p>Número mín: <?=   mostrarMin($miArray); ?></p>
    <p>El Número máS veces repetido es el: <?=  mostrarMasVecesRepe($miArray); ?></p>

</div>

<hr>
<?php show_source(__FILE__); ?>
<hr>
</body>
</html>