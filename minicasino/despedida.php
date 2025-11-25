<html>
<head>
<meta charset="UTF-8">
<title>Minicasino</title>
</head>

<body>

<!-- Muestra el mensaje generado en el programa principal -->
<p><?= $msg ?> </p>

<p>
 Muchas gracias por jugar con nosotros. <br> 
 
 <!-- Muestra el saldo final guardado en la sesión -->
 Su resultado final es de <?= $_SESSION['disponible'] ?> Euros <br>

 <!-- Botón para volver a jugar: recarga el propio archivo PHP -->
 <input type="button" value="  VOLVER A JUGAR " onclick="location.href='<?=$_SERVER['PHP_SELF'];?>'" >
</p>

</body>
</html>
