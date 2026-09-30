<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

$num = random_int(1,9);
echo "Número generado ". $num. "<br>";


for ($i =1; $i<=$num;$i++){
    for ($k =1; $k<=$i;$k++){
        echo $i;
        
       
    }
    echo "<br>";
}

 



?>    
</body>
</html>