<?php
    $numA_rand =random_int(1,30);
    $numB_rand =random_int(1,30);
    $numC=0;

    function elmayor(int $A, int $B, int & $C){
        if($A == $B){
            $C = 0;
        }elseif($A > $B){
            $C = $A;
        }else{
            $C = $B;
        }
    }

    elmayor($numA_rand,$numB_rand,$numC);


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    El mayor

  </title>

</head>

<body>
  <h1>El mayor</h1>
  <p>A = <?= $numA_rand ?>, B = <?= $numB_rand ?> → C = <?= $numC ?></p>

  
</body>

</html>