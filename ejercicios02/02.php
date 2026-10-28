<?php
require_once 'funcionesvar.php';
$num1 = random_int(1,10);
$num2 = random_int(1,10);
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    operaciones
  </title>

</head>

<body>
  <h1>Números generados: </h1>
  <h3>1º Número : <?= $num1 ?></h3>
  <h3>2º Número : <?= $num2 ?></h3>

  <p><?= $num1 ?> + <?= $num2 ?> = <?= calSuma($num1, $num2) ?></p>
  <p><?= $num1 ?> - <?= $num2 ?> = <?= calResta($num1, $num2) ?></p>
  <p><?= $num1 ?> * <?= $num2 ?> = <?= calMultiplicacion($num1, $num2) ?></p>
  <p><?= $num1 ?> / <?= $num2 ?> = <?= calDivision($num1, $num2) ?></p>
  <p><?= $num1 ?> ** <?= $num2 ?> = <?= calPotencia($num1, $num2) ?></p>
  


  
</body>

</html>