<!DOCTYPE html>
<?php 

$deportes = ["baloncesto"=>"img/baloncesto.jpeg", 
"futbol"=>"img/futbol.jpeg",
"tenis"=>"img/tenis.jpeg", 
"volley"=>"img/volley.jpeg"];




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
            <tr><th>Deporte</th><th>Logo</th></tr>
            <?php
            foreach($deportes as $clave=>$ruta):
            ?>
                <tr><td><?=$clave ?></td><td><img width=100 src="<?=$ruta ?>"></td></tr>
            <?php
            endforeach
            ?>
        </table>
    </div>
</body>
</html>