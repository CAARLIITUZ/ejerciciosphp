<!DOCTYPE html>
<?php 


$arrayBonoLoto=[];
$contadorN = 0;

while($arrayBonoLoto.length<6){
    $numRandom =random_int(1,49);
    $arrayBonoLoto[] = $numRandom;
    $contadorN++;
}


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        th {
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div id="content">
        <table>
            <tr><th>Numeros bonoloto</th><th></th></tr>
            <?php
            foreach($arrayBonoLoto as $clave=>$ruta):
            ?>
                <tr><td><?=$clave ?></td><td><?=$ruta ?></td></tr>
            <?php
            endforeach
            ?>
        </table>
    </div>
</body>
</html>