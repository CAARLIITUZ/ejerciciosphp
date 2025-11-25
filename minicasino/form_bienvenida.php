<html>
<head>
<meta charset="UTF-8">
<title>Minicasino</title>
</head>

<body>

 <!-- Título principal de la página -->
 <h1> BIENVENIDO AL CASINO</h1> <br>

 <!-- Muestra el número de veces que el usuario ha accedido al casino -->
 Esta es su <?= $visitas ?>º visita.<br>

 <!-- Formulario donde el usuario introduce el dinero inicial con el que va a jugar -->
 <form method="post">
     Introduzca el dinero con el que va jugar:
     <input name="cantidadini" type="number">		
 </form>

</body>
</html>
