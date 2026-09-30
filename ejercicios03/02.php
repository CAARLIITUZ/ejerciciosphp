<!DOCTYPE html>
<?php 

$medios = ["El pais"=>"https://elpais.com/", 
"El mundo"=>"https://www.elmundo.es/",
"El ABC"=>"https://www.abc.es/", 
"La Vanguardia"=>"https://www.lavanguardia.com/",
"20minutos"=>"https://www.20minutos.es/"];


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
			<th style="color: blue;">Periodicos</th>
		</tr>
        <tr>
			<th style="color: blue;">Hiperenlaces</th>
		</tr>
        <?php 
        foreach ($medios as $periodico){
            echo "<tr><td>$periodico</td>";
        }
        ?> 
    </table>
    
    
</div>
</body>
</html>