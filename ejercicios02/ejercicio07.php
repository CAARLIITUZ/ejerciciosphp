<?php
// Versión 1: colores fijos
$colores = ['red', 'green', 'blue', 'white', 'black'];

function colorAleatorio() {
    global $colores;
    return $colores[array_rand($colores)];
}

echo "<table cellpadding='0' cellspacing='0' style='border-collapse:collapse;'>";

for ($i = 0; $i < 10; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 10; $j++) {
        $color = colorAleatorio();
        echo "<td style='width:30px; height:30px; background-color:$color;'></td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
