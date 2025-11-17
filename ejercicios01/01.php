<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n1 = random_int(1,10);
    $n2 = random_int(1,10);
    echo "Nº1 es: = ". $n1."</br>";
    echo "Nº2 es: = ". $n2."</br><hr>";
    echo "$n1+$n2= ". ($n1+$n2)."</br>";
    echo "$n1-$n2= ". ($n1-$n2)."</br>";
    echo "$n1*$n2= ". ($n1*$n2)."</br>";
    echo "$n1/$n2= ". ($n1/$n2)."</br>";
    echo "$n1%$n2= ". ($n1%$n2)."</br>";
    echo "$n1**$n2= ". ($n1**$n2)."</br>";
    ?>
</body>
</html>