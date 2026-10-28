<!DOCTYPE html>
<?php 

$medios = ["El pais"=>"https://elpais.com/", 
"El mundo"=>"https://www.elmundo.es/",
"El ABC"=>"https://www.abc.es/", 
"La Vanguardia"=>"https://www.lavanguardia.com/",
"20minutos"=>"https://www.20minutos.es/"];


$indice = array_rand($medios);


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="content">
    <ul>
        <?php 
        foreach ($medios as $clave => $valor):
        ?>

            <li> <a href="<?= $valor ?>"><?= $clave ?> </a> </li>
        <?php
        endforeach
        ?>
        <p>El Medio recomendado es:</p> <a href="<?=$medios[$indice] ?>"> <?=$indice ?></a>

        
            
         
    </ul>
    
    
</div>
</body>
</html>