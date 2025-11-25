<html>
<head>
<meta charset="UTF-8">
<title>Minicasino</title>
</head>

<body>

<!-- Muestra el mensaje generado previamente en el programa principal -->
<p><?= $msg ?> </p>

<!-- Muestra el saldo disponible almacenado en la sesión -->
Dispone de  <?= $_SESSION["disponible"] ?> para jugar

<!-- Formulario para realizar una apuesta -->
<form method="POST">

    <!-- Cantidad que el usuario quiere apostar -->
    Cantidad a apostar :
    <input name="cantidad" type="number"> <br>

    <!-- Selección del tipo de apuesta: PAR o IMPAR -->
    Tipo de apuesta : 
    <input type="radio" name="apuesta" value="PAR" checked='checked'> Par
    <input type="radio" name="apuesta" value="IMPAR"> Impar <br>

    <!-- Botón para realizar la apuesta -->
    <button name='apostar' value='apostar'> Apostar cantidad </button>

    <!-- Botón para abandonar el casino (termina la sesión) -->
    <button name='dejar' value='dejar'> Abandonar el Casino </button>

</form>

</body>
</html>

